# Bootcamp-Javan

Bootcamp Javan Assignments

Sebelum penggunaan dapat melakukan composer update dan migrate terlebih dahulu. Agar dapat login silahkan login register terlebih dahulu. Setelah migrate database kemudian dapat mengisikan kejuruan di menu kejuruan. Kemudian setelah mengisikan kejuruan baru dapat mengisikan data siswa.

<strong>Init Step</strong>

<ul>
  <li>Composer update</li>
  <li>Create database dengan nama school_db</li>
  <li>php spark migrate</li>
  <li>Disini menggunakan Myth-Auth Library, Jika terjadi error maka perlu ubah versi library ke beta set dibagian composer.json</li>
  <li>Apabila terjadi error pada <b>vendor\myth\auth\src\Filters\LoginFilter.php</b> , silahkan tambahkan parameter <b>$arguments = NULL</b> pada line <b>26</b> dan line <b>63</b></li>
</ul>
