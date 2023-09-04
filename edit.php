<?php
include_once("./Models/Student.php");

$student = Student::show($_GET['id']);

if(isset($_POST['submit'])) {
    $response = Student::update([
        'name' => $_POST['name'],
        'nis' => $_POST['nis'],
        'id' => $_GET['id'],
    ]);

    setcookie('message', $response, time() + 10);

    header("Location: index.php");
}
 ?>

<?php include('layouts/top.php') ?>
<?php include('layouts/header.php') ?>

<?php if(isset($_COOKIE['message'])) : ?>
    <div class="p-3 bg-green-600 text-white mt-1 mb-2 mx-10 rounded-lg text-center">
      <p><?= $_COOKIE['message'] ?></p>
    </div>
<?php endif ?>

<!-- content -->
<div class="bg-slate-300 rounded-xl p-3">
    <input type="hidden" value="<?= $student['id']?>">
    <div class="text-xl mb-2">Edit Input Siswa</div>
    <form action="" method="POST">
        <div class="mb-2">
        </div>
          <label for="name">Nama</label>
          <input class="rounded-xl p-2 block w-full" type="text" name="name" placeholder="Masukan nama" value="<?= $student['name'] ?>" />
        </div>
        <div class="mb-2">
          <label for="nis">NIS</label>
          <input class="rounded-xl p-2 block w-full" type="number" name="nis" placeholder="Masukan NIS" value="<?= $student['nis'] ?>"/>
        </div>
        <div class="grid gap-2">
          <button class="bg-blue-500 hover:bg-blue-800 p-3 rounded-xl text-white" type="submit" name="submit">
              Submit
        </button>
        </div>
      </form>
    </form>
</div>



<?php include('layouts/footer.php') ?>
<?php include('layouts/bottom.php') ?>