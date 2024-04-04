<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrasi</title>
<style>
.formreg {
    font-family: "Comic Sans MS", cursive;
    background-color: #CCCCCC;
}
</style>
</head>
<body>
<form id="Registrasi" name="Registrasi" method="post" action="proses_registrasi.php">
  <table width="530" border="0" align="center" class="formreg">
    <tr>
      <td colspan="4"><div align="center">
        <h1>REGISTRASI</h1>
      </div></td>
    </tr>
    <tr>
      <td width="64">&nbsp;</td>
      <td width="143">User Name</td>
      <td width="80">:</td>
      <td width="345"><input name="txt_user" type="text" class="formreg" id="textfield2" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Password</td>
      <td>:</td>
      <td><input name="txt_pass" type="password" class="formreg" id="txt_pass" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Nama</td>
      <td>:</td>
      <td><input name="txt_nama" type="text" class="formreg" id="textfield4" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Jenis Kelamin</td>
      <td>:</td>
      <td id="Laki-laki">
        <input name="jenkel" type="radio" class="formreg" id="radio" value="Pria" />
        <label for="jenkel">Pria</label>
        <input name="jenkel" type="radio" class="formreg" id="radio2" value="Wanita" />
        <label for="jenkel">Wanita</label>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Pekerjaan</td>
      <td>:</td>
      <td><input name="txt_pekerjaan" type="text" class="formreg" id="txt_pekerjaan" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Alamat</td>
      <td>:</td>
      <td><textarea name="txt_alamat" cols="35" rows="4" class="formreg" id="txt_alamat"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Kota</td>
      <td>:</td>
      <td><input name="txt_kota" type="text" class="formreg" id="textfield5" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Provinsi</td>
      <td>:</td>
      <td>
        <select name="txt_provinsi" class="formreg" id="txt_provinsi">
          <option value="">PILIH</option>
          <option value="Sumatera Selatan">Sumatera Selatan</option>
          <option value="Jambi">Jambi</option>
          <option value="Bengkulu">Bengkulu</option>
          <option value="Lampung">Lampung</option>
          <option value="Sumatera Barat">Sumatera Barat</option>
          <option value="DKI Jakarta">DKI Jakarta</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Kode Pos</td>
      <td>:</td>
      <td><input name="txt_kdpos" type="text" class="formreg" id="textfield6" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>No. Telp</td>
      <td>:</td>
      <td><input name="txt_notel" type="text" class="formreg" id="textfield7" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Email</td>
      <td>:</td>
      <td><input name="txt_email" type="text" class="formreg" id="textfield8" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="formreg">No. Rekening</td>
      <td>:</td>
      <td><input name="txt_norek" type="text" class="formreg" id="textfield9" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Nama Bank</td>
      <td>:</td>
      <td>
        <select name="txt_bank" class="formreg" id="txt_bank">
          <option value="">PILIH</option>
          <option value="BRI">BRI</option>
          <option value="BCA">BCA</option>
          <option value="BNI">BNI</option>
          <option value="Mandiri">Mandiri</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="4"><div align="center">
        <p>&nbsp;</p>
        <p>
          <input name="daftar" type="submit" id="daftar" value="DAFTAR" />
          <input type="reset" name="batal" id="batal" value="BATAL" />
        </p>
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
