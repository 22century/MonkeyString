<!DOCTYPE html>
<html lang="ja">
<head>
<title>Moneky String</title>
<style>
body, html {
	background: #F5F5F0;
	color: #333333;
	font-family: "Lucida Grande", sans-serif;
	font-size: 12px;
}
h1 {
	background: #060606;
	color: #fff;
	margin: 0;
	padding: 5px 15px;
	font-weight: normal;
	font-size: 20px;
}
table {
	background: #fff;
	border-collapse: collapse;
	width: 100%;
	margin-bottom: 50px;
}
th {
	text-align: left;
	background: #E2E2D7;
}
td, th {
	font-family: Menlo, sans-serif;
	border: solid 2px #E0E0DC;
	padding: 2px 10px;
}
tr {
}
</style>
</head>
<body>
<?
require('MonkeyString.php');

use Monkey\MonkeyString as String;

$t = '0123ABcdあいう';

?>
<script>
var text = '0123ABcdあいう';
</script>
<h1>Monkey String</h1>
<table>
	<tr>
		<th>property|method</th>
		<th>php</th>
		<th>js (MonkeyMonkey)</th>
	</tr>
	<tr>
		<td>"<?= $t ?>".length</td>
		<td><? $s = new String($t); echo $s->length; ?></td>
		<td><script>document.write(text.length);</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".charAt()</td>
		<td><? $s = new String($t); echo $s->charAt() ?></td>
		<td><script>document.write(text.charAt());</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".charAt(10)</td>
		<td><? $s = new String($t); echo $s->charAt(10) ?></td>
		<td><script>document.write(text.charAt(10));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".charCodeAt()</td>
		<td><? $s = new String($t); echo $s->charCodeAt() ?></td>
		<td><script>document.write(text.charCodeAt());</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".charCodeAt(10)</td>
		<td><? $s = new String($t); echo $s->charCodeAt(10) ?></td>
		<td><script>document.write(text.charCodeAt(10));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".concat('')</td>
		<td><? $s = new String($t); echo $s->concat('') ?></td>
		<td><script>document.write(text.concat(''));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".concat('えお')</td>
		<td><? $s = new String($t); echo $s->concat('えお') ?></td>
		<td><script>document.write(text.concat('えお'));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".concat('えお', '123')</td>
		<td><? $s = new String($t); echo $s->concat('えお', '123') ?></td>
		<td><script>document.write(text.concat('えお', '123'));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".contains('')</td>
		<td><? $s = new String($t); var_export( $s->contains('') ) ?></td>
		<td><script>document.write(text.contains(''));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".contains('100')</td>
		<td><? $s = new String($t); var_export( $s->contains('100') ) ?></td>
		<td><script>document.write(text.contains('100'));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".contains('あいう')</td>
		<td><? $s = new String($t); var_export( $s->contains('あいう') ) ?></td>
		<td><script>document.write(text.contains('あいう'));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".endsWith('')</td>
		<td><? $s = new String($t); var_export( $s->endsWith('') ) ?></td>
		<td><script>document.write(text.endsWith(''));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".endsWith('123')</td>
		<td><? $s = new String($t); var_export( $s->endsWith('123') ) ?></td>
		<td><script>document.write(text.endsWith('123'));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".endsWith('い', 10)</td>
		<td><? $s = new String($t); var_export( $s->endsWith('い', 10) ) ?></td>
		<td><script>document.write(text.endsWith('い', 10));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".indexOf('')</td>
		<td><? $s = new String($t); var_export( $s->indexOf('') ) ?></td>
		<td><script>document.write(text.indexOf(''));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".indexOf('123')</td>
		<td><? $s = new String($t); var_export( $s->indexOf('123') ) ?></td>
		<td><script>document.write(text.indexOf('123'));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".lastIndexOf('')</td>
		<td><? $s = new String($t); var_export( $s->lastIndexOf('') ) ?></td>
		<td><script>document.write(text.lastIndexOf(''));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".lastIndexOf('123')</td>
		<td><? $s = new String($t); var_export( $s->lastIndexOf('123') ) ?></td>
		<td><script>document.write(text.lastIndexOf('123'));</script></td>
	</tr>
	<tr>
		<td>"ABC".localeCompare("ABC")</td>
		<td><? $s = new String('ABC'); var_export( $s->localeCompare('ABC') ) ?></td>
		<td><script>document.write('ABC'.localeCompare('ABC'));</script></td>
	</tr>
	<tr>
		<td>"ABC".localeCompare("abc")</td>
		<td><? $s = new String('ABC'); var_export( $s->localeCompare('abc') ) ?></td>
		<td><script>document.write('ABC'.localeCompare('abc'));</script></td>
	</tr>
	<tr>
		<td>"ABC".localeCompare("ABCD")</td>
		<td><? $s = new String('ABC'); var_export( $s->localeCompare('ABCD') ) ?></td>
		<td><script>document.write('ABC'.localeCompare('ABCD'));</script></td>
	</tr>
	<tr>
		<td>"1".localeCompare("A")</td>
		<td><? $s = new String('1'); var_export( $s->localeCompare('A') ) ?></td>
		<td><script>document.write('1'.localeCompare('A'));</script></td>
	</tr>
	<tr>
		<td>"あいう".localeCompare("あいう")</td>
		<td><? $s = new String('あいう'); var_export( $s->localeCompare('あいう') ) ?></td>
		<td><script>document.write('あいう'.localeCompare('あいう'));</script></td>
	</tr>
	<tr>
		<td>"う".localeCompare("あ")</td>
		<td><? $s = new String('う'); var_export( $s->localeCompare('あ') ) ?></td>
		<td><script>document.write('う'.localeCompare('あ'));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".match(/(1)(2).*[aA](.*)/)</td>
		<td><? $s = new String($t); echo implode(',', $s->match('/(1)(2).*[aA](.*)/')) ?></td>
		<td><script>document.write(text.match(/(1)(2).*[aA](.*)/));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".match(/.*/)</td>
		<td><? $s = new String($t); echo implode(',', $s->match('/.*/')) ?></td>
		<td><script>document.write(text.match(/.*/));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".quote()</td>
		<td><? $s = new String($t); echo $s->quote('') ?></td>
		<td><script>document.write(text.quote(''));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".replace('', '')</td>
		<td><? $s = new String($t); echo $s->replace('','') ?></td>
		<td><script>document.write(text.replace('',''));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".replace('/1/', 'ん')</td>
		<td><? $s = new String($t); echo $s->replace('/1/','ん') ?></td>
		<td><script>document.write(text.replace(/1/,'ん'));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".replace(/[\d]/, function(){return '@'})</td>
		<td><? $s = new String($t); echo $s->replace('/[\d]+/',function(){return '@';}) ?></td>
		<td><script>document.write(text.replace(/[\d]+/,function(){return '@';}));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".slice(0, 0)</td>
		<td><? $s = new String($t); echo( $s->slice(0,0) ) ?></td>
		<td><script>document.write(text.slice(0,0));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".slice(0, 3)</td>
		<td><? $s = new String($t); echo( $s->slice(0,3) ) ?></td>
		<td><script>document.write(text.slice(0,3));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".slice(2, 8)</td>
		<td><? $s = new String($t); echo( $s->slice(2,8) ) ?></td>
		<td><script>document.write(text.slice(2,8));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".slice(1, -6)</td>
		<td><? $s = new String($t); echo( $s->slice(1, -6) ) ?></td>
		<td><script>document.write(text.slice(1, -6));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".slice(3, -3)</td>
		<td><? $s = new String($t); echo( $s->slice(3,-3) ) ?></td>
		<td><script>document.write(text.slice(3,-3));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".split('')</td>
		<td><? $s = new String($t); echo( implode(',',$s->split('')) ) ?></td>
		<td><script>document.write(text.split(''));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".split('', 5)</td>
		<td><? $s = new String($t); echo( implode(',',$s->split('',5)) ) ?></td>
		<td><script>document.write(text.split('',5));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".split('3')</td>
		<td><? $s = new String($t); echo( implode(',',$s->split('3')) ) ?></td>
		<td><script>document.write(text.split('3'));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".split('2', 1)</td>
		<td><? $s = new String($t); echo( implode(',',$s->split('2', 1)) ) ?></td>
		<td><script>document.write(text.split('2', 1));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".startsWith('')</td>
		<td><? $s = new String($t); var_export( $s->startsWith('') ) ?></td>
		<td><script>document.write(text.startsWith(''));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".startsWith('A')</td>
		<td><? $s = new String($t); var_export( $s->startsWith('A') ) ?></td>
		<td><script>document.write(text.startsWith('A'));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".startsWith('A', 4)</td>
		<td><? $s = new String($t); var_export( $s->startsWith('A', 4) ) ?></td>
		<td><script>document.write(text.startsWith('A', 4));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".substr(0, 0)</td>
		<td><? $s = new String($t); echo ( $s->substr(0,0) ) ?></td>
		<td><script>document.write(text.substr(0,0));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".substr(1)</td>
		<td><? $s = new String($t); echo ( $s->substr(1) ) ?></td>
		<td><script>document.write(text.substr(1));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".substr(6, -5)</td>
		<td><? $s = new String($t); echo ( $s->substr(6, -5) ) ?></td>
		<td><script>document.write(text.substr(6, -5));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".substr(-5, 2)</td>
		<td><? $s = new String($t); echo ( $s->substr(-5, 2) ) ?></td>
		<td><script>document.write(text.substr(-5, 2));</script></td>
	</tr>

	<tr>
		<td>"<?= $t ?>".substring(0, 0)</td>
		<td><? $s = new String($t); echo ( $s->substring(0,0) ) ?></td>
		<td><script>document.write(text.substring(0,0));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".substring(2, 6)</td>
		<td><? $s = new String($t); echo ( $s->substring(2,6) ) ?></td>
		<td><script>document.write(text.substring(2,6));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".substring(6, 2)</td>
		<td><? $s = new String($t); echo ( $s->substring(6,2) ) ?></td>
		<td><script>document.write(text.substring(6,2));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".substring(5, -2)</td>
		<td><? $s = new String($t); echo ( $s->substring(5, -2) ) ?></td>
		<td><script>document.write(text.substring(5, -2));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".substring(-5, 2)</td>
		<td><? $s = new String($t); echo ( $s->substring(-5, 2) ) ?></td>
		<td><script>document.write(text.substring(-5, 2));</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".toLowerCase()</td>
		<td><? $s = new String($t); echo ( $s->toLowerCase() ) ?></td>
		<td><script>document.write(text.toLowerCase());</script></td>
	</tr>
	<tr>
		<td>"<?= $t ?>".toUpperCase()</td>
		<td><? $s = new String($t); echo ( $s->toUpperCase() ) ?></td>
		<td><script>document.write(text.toUpperCase());</script></td>
	</tr>
	<? $trimText = ' 　abc 　'; ?>
	<script>var trimText = ' 　abc 　';</script>
	<tr>
		<td>"<?= $trimText ?>".trim()</td>
		<td><? $s = new String($trimText); echo ( $s->trim() ) ?></td>
		<td><script>document.write(trimText.trim());</script></td>
	</tr>
	<tr>
		<td>"<?= $trimText ?>".trimLeft()</td>
		<td><? $s = new String($trimText); echo ( $s->trimLeft() ) ?></td>
		<td><script>document.write(trimText.trimLeft());</script></td>
	</tr>
	<tr>
		<td>"<?= $trimText ?>".trimRight()</td>
		<td><? $s = new String($trimText); echo ( $s->trimRight() ) ?></td>
		<td><script>document.write(trimText.trimRight());</script></td>
	</tr>
</table>

<script>
	var trAll = document.querySelectorAll('table tr');
	for (var i=0,l=trAll.length;i<l;i++) {
		var tr = trAll[i];
		var td = tr.querySelectorAll('td');
		if (td.length > 0) {
			if (typeof td[2].childNodes[1] !== 'undefined') {
				if (td[1].textContent !== td[2].childNodes[1].textContent) {
					td[1].style.color = '#990000';
					td[1].style.fontStyle = 'italic';
				} else {
					td[1].style.color = '#02893D';
				}
			}
		}
	}
</script>

</body>
</html>