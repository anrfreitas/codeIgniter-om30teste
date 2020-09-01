<script>
var $=jQuery.noConflict();

/******************************************************************************
Formata uma data para o padrao dd/mm/yyyy
******************************************************************************/	
function formatarData(dataStr) {
	
	if(dataStr == '' || dataStr == null)
	{
		var dia = new Date().getDate();
		var ano = new Date().getFullYear()
		var mes = new Date().getMonth() + 1;
		
		dia = dia < 10 ? '0' + dia : '' + dia;
		mes = mes < 10 ? '0' + mes : '' + mes;
		
		return dia + '/' + mes + '/' + ano;
	}
	
	else
	{
		return dataStr.substring(8, 10) + "/" + dataStr.substring(5, 7) + "/" + dataStr.substring(0, 4);
	}
}

/******************************************************************************
Formata uma data para o padrao de americano MM/dd/yyyy
******************************************************************************/	
function formatarDataUS(dataStr) {
	
	if(dataStr == '' || dataStr == null)
	{
		var dia = new Date().getDate();
		var ano = new Date().getFullYear()
		var mes = new Date().getMonth() + 1;
		
		dia = dia < 10 ? '0' + dia : '' + dia;
		mes = mes < 10 ? '0' + mes : '' + mes;
		
		return mes + '/' + dia + '/' + ano;
	}
	
	else
		return  dataStr.substring(3, 5) + "/" + dataStr.substring(0, 2) + "/" + dataStr.substring(6, 10)
}

/******************************************************************************
Formata uma data para o padrao de banco de dados yyyy-mm-dd
******************************************************************************/	
function formatarDataInversa(dataStr) {
	
	if(dataStr == '' || dataStr == null)
	{
		var dia = new Date().getDate();
		var ano = new Date().getFullYear()
		var mes = new Date().getMonth() + 1;
		
		dia = dia < 10 ? '0' + dia : '' + dia;
		mes = mes < 10 ? '0' + mes : '' + mes;
		
		return ano + '-' + mes + '-' + dia;
	}
	
	else
		return dataStr.substring(6, 10) + "-" + dataStr.substring(3, 5) + "-" + dataStr.substring(0, 2);
}


function MessageBox(tmp_msgbox_mensagem)
{
    alert(tmp_msgbox_mensagem);
}

//Função depreciada em 29/11/2018
/*var isValidDate = function(str) {
    return str == 'dd/mm/yyyy' || 
           ( /^\d{2}\/\d{2}\/\d{4}$/.test(str) && new Date(str).getTime() );
}*/

function isValidDate(dateIN)
{
	var date = formatarDataUS(dateIN);
    var matches = /^(\d{2})[-\/](\d{2})[-\/](\d{4})$/.exec(date);
    if (matches == null) return false;
    var d = matches[2];
    var m = matches[1] - 1;
    var y = matches[3];
    var composedDate = new Date(y, m, d);
    return composedDate.getDate() == d &&
            composedDate.getMonth() == m &&
            composedDate.getFullYear() == y;
}

function isEmail(tmp_convert_email)
{
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(filter.test(tmp_convert_email)) return true;
    else return false;
}

function excluirImagem(tmp_exc_Imagem_id)
{
	$.ajax({
		type: 'POST',
		url: './deleteImage',
		data: {
			'id' : tmp_exc_Imagem_id,
			},
		cache: false,
		success: function(result) {
		}
	});
}

function readCookie(tmp_rcook_name) {
    var nameEQ = tmp_rcook_name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function parseInt2Bool(tmp_prsint32_value)
{
	if(tmp_prsint32_value == 1) return true;
	else return false;
}

function parseBool2Int(tmp_prsbol32_value)
{
	if(tmp_prsbol32_value == true) return 1;
	else return 0;
}

function clearTable(tmp_cltbl_id)
{
	var table = $('#' + tmp_cltbl_id).DataTable();
	table.clear().draw();
}

function insertRowTable(tmp_intbl_id,tmp_insrow_data)
{
	var table = $('#' + tmp_intbl_id).DataTable();
	table.row.add(tmp_insrow_data).draw();
}

//Correção - Previnir padding-right do Bootstrap Modal
$(document.body).on('hide.bs.modal,hidden.bs.modal', function () {
	setTimeout(function() { $('body').css('padding-right','0'); } , 500);
});

</script>

<?php

//Passa um número que ele gerará uma cadeia de caracteres aleatórios
function rand_uniqid($in, $to_num = false, $pad_up = false, $passKey = null)
{
	$index = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	if ($passKey !== null) {
		// Although this function's purpose is to just make the
		// ID short - and not so much secure,
		// you can optionally supply a password to make it harder
		// to calculate the corresponding numeric ID

		for ($n = 0; $n<strlen($index); $n++) {
			$i[] = substr( $index,$n ,1);
		}

		$passhash = hash('sha256',$passKey);
		$passhash = (strlen($passhash) < strlen($index))
			? hash('sha512',$passKey)
			: $passhash;

		for ($n=0; $n < strlen($index); $n++) {
			$p[] =  substr($passhash, $n ,1);
		}

		array_multisort($p,  SORT_DESC, $i);
		$index = implode($i);
	}

	$base  = strlen($index);

	if ($to_num) {
		// Digital number  <<--  alphabet letter code
		$in  = strrev($in);
		$out = 0;
		$len = strlen($in) - 1;
		for ($t = 0; $t <= $len; $t++) {
			$bcpow = bcpow($base, $len - $t);
			$out   = $out + strpos($index, substr($in, $t, 1)) * $bcpow;
		}

		if (is_numeric($pad_up)) {
			$pad_up--;
			if ($pad_up > 0) {
				$out -= pow($base, $pad_up);
			}
		}
		$out = sprintf('%F', $out);
		$out = substr($out, 0, strpos($out, '.'));
	} else {
		// Digital number  -->>  alphabet letter code
		if (is_numeric($pad_up)) {
			$pad_up--;
			if ($pad_up > 0) {
				$in += pow($base, $pad_up);
			}
		}

		$out = "";
		for ($t = floor(log($in, $base)); $t >= 0; $t--) {
			$bcp = bcpow($base, $t);
			$a   = floor($in / $bcp) % $base;
			$out = $out . substr($index, $a, 1);
			$in  = $in - ($a * $bcp);
		}
		$out = strrev($out); // reverse
	}

	return $out;
}
?>