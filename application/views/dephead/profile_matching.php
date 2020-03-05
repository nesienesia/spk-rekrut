<br/>
<strong>Analisa Menggunakan Sistem Pendukung Keputusan (SPK) Metode Profile Matching</strong>
<br /><br />
<?php	
if ($this->input->post('button') == '')
{
?>	
<form name="form1" method="post" action="<?php echo site_url('profile_matching/index'); ?>"><br>
  <table align="center" width="600" border="1" cellspacing="0" cellpadding="5">
  <tr>
  <td id="ignore" bgcolor="#DBEAF5" width="600" colspan="2"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">NILAI PROFIL STANDAR (IDEAL) YANG DICARI </font></strong></div></td></tr>
  <?php
		foreach ($tabelkriteria as $rowkriteria)
		{
	?>        
    <tr>
      <td width="300"><?php echo $rowkriteria->nama_kriteria; ?></td>
      <td width="300"> 
        <select name="nilai_profil<?php echo $rowkriteria->id_kriteria; ?>" id="nilai_profil<?php echo $rowkriteria->id_kriteria; ?>">
          <option value="">&nbsp;</option>
		<?php
			foreach ($tabelsubkriteria[$rowkriteria->id_kriteria] as $rowsubkriteria)
			{
		?>		          
          <option value="<?php echo $rowsubkriteria->nilai_sub_kriteria; ?>"><?php echo $rowsubkriteria->nama_sub_kriteria; ?> (<?php echo $rowsubkriteria->nilai_sub_kriteria; ?>)</option>
        <?php
			}
		?>
        </select>
        </td>
    </tr>
    <?php } ?>	
    <tr>
      <td colspan="2"><input type="submit" name="button" value="Proses"></td>
    </tr>
  </table>
  <br>
</form>
<?php
}
else
{
?>
	<div id="perhitungan" style="display:none;">
		<br /> 
<?php
	echo $html;
?>
<br />
</div>
<br />
<input type="button" value="Perhitungan" onclick="document.getElementById('perhitungan').style.display='block';"/>
<br />
<br />
Hasil Analisa Menggunakan Sistem Pendukung Keputusan (SPK) Metode Profile Matching<br/>
<br />
<table width="500" border="0" cellspacing="1" cellpadding="3" bgcolor="#000099">
	<tr>
    	<td bgcolor="#FFFFFF">Rangking</td>
    	<td bgcolor="#FFFFFF">Nama Individu</td>
    	<td bgcolor="#FFFFFF">Nilai Profile Matching</td>
    </tr>
<?php
	for ($i=0;$i<count($nm_karyawan_rangking);$i++)
	{	
?>
    <tr>
    	<td bgcolor="#FFFFFF"><?php echo ($i+1); ?></td>
    	<td bgcolor="#FFFFFF"><?php echo $nm_karyawan_rangking[$i]; ?></td>
    	<td bgcolor="#FFFFFF"><?php echo $total_nilai_rangking[$i]; ?></td>
    </tr>
<?php
	}
?>
</table>
<br />
Hasil Kecocokan Terbesar Didapatkan oleh Individu dengan Nama = <?php echo $nm_karyawan_rangking[0]; ?> dengan Nilai Profile Matching Terbesar = <?php echo $total_nilai_rangking[0]; ?>
<br />
<?php
}
?>
<br />