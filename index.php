<?php
include_once('./Models/Student.php');

$students = Student::index();

if(isset($_POST['submit'])){
    $response = Student::create([
        'name' => $_POST['name'],
        'nis' => $_POST['nis']
    ]);

    echo $response;
    
    header("location: index.php");
}

if(isset($_POST['delete'])){
    $response = Student::delete($_POST['id']);

    echo $response;
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Rank Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body>
    <div>
        <!-- header -->
        <nav class="bg-slate-800">
            <div>
                <h1 class="font-bold text-3xl p-3 pl-5 text-white text-center">Tabel kelas</h1>
            </div>
        </nav>
        <!-- main -->
        <div class="flex">
        <!-- sidebar -->
        <div class="basis-1/4 bg-gradient-to-r from-cyan-500 to-blue-500">
            <form action="" method="POST" class="mt-5 m-4 bg-gray-300 rounded-xl p-5">
                <h1 class="font-bold text-3xl pb-5 text-gray-700">Form Input Siswa</h1>
                <div class="mb-3">
                    <label for="nama">Nama :</label>
                    <input class="rounded-lg block w-full placeholder:font-sans p-1 border-2 text-sm" type="text" id="name" name="name" placeholder="Masukan Nama" required>    
                </div>
                <div class="mb-3">
                    <label for="nilai">Nis :</label>
                    <input class="rounded-lg block w-full placeholder:font-sans p-1 border-2 text-sm" type="number" id="nis" name="nis" placeholder="Masukan nis" required  >    
                </div>
                <div class="grid gap-2">
                    <button class="bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-cyan-700 hover:to-blue-700 rounded-xl p-1.5 font-semibold" type="submit" name="submit">kirim</button>
                </div>
            </form>
        </div>
        <!-- content -->
            <div class="basis-3/4 bg-gradient-to-r from-blue-500 to-cyan-500">
                <div class="rounded-xl mt-5 m-4 bg-gray-300 p-5">
                    <h1 class="text-center font-bold text-3xl fonr-medium pb-5 text-gray-700">Tabel Siswa</h1>
                    <table class="w-full text-center">
                        <thead class="bg-white text-black border border-gray-300">
                            <tr>
                                <th class="p-3 w-25">No</th>
                                <th>Nama Siswa</th>
                                <th>NIS</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody class="border border-gray-300 bg-white rounded-xl">
                            <?php foreach($students as $key => $student) : ?>
                            <tr class= "border border-gray-300">
                                <td class="p-4"><?= $key + 1 ?></td>
                                <td><?=$student['name'] ?></td>
                                <td><?=$student['nis'] ?></td>
                                <td>
                                    <a href="detail.php?id=<?= $student ['id'] ?>" class="bg-gradient-to-r from-blue-400 to-cyan-500 hover:from-blue-700 hover:to-cyan-700 p-2 px-3 rounded-xl text-white">Detail</a>
                                    <button class="bg-gradient-to-r from-blue-400 to-cyan-500 hover:from-blue-700 hover:to-cyan-700 rounded-xl p-2 px-3 text-white">
                                        <a href="edit.php?id=<?= $student ['id'] ?>">Edit</a>
                                    </button>
                                    <form action="" method="POST" class="inline">
                                    <input type="hidden" name="id"value="<?= $student['id']?>">
                                    <button type="submit" name="delete" class="bg-gradient-to-r from-red-400 to-pink-500 hover:from-red-700 hover:to-pink-700 rounded-xl p-2 px-3 text-white">
                                        <a href="">Hapus</a>
                                    </button>
                                </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- footer -->
        <footer class="w-full bg-slate-800 text-white text-center p-3 border-x-black">Hak Ciptaan Saya</footer>
    </div>
</body>
</html>