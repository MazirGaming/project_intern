<?php
$servername = "localhost";
$username = "root";
$password = "123";

// Create connection
$connect = new mysqli($servername, $username, $password, "project");

// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
$sql = 'SELECT * FROM users' ;
$query = mysqli_query($connect, $sql);
$totalUser = mysqli_num_rows($query);
$limit = 3;
$totalPage = ceil($totalUser/$limit);
$currentPage = $_GET['page'] ?? 1; 
$start = ($currentPage - 1) * $limit;
$start += 0;    
?>
@extends('layouts.main')
@section('main')

<div class="row">
                    <div class="col-md-12 d-flex">

                        <div class="card card-table flex-fill">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Avatar</th>

                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <!-- <th>Logout time</th>
                                                <th>Last login</th> -->
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $users = [];
                                            while ($user = mysqli_fetch_object($query)){
                                                array_push($users,$user);
                                                
                                            }
                                            $newLimit = ($limit * $currentPage);
                                            for ($start; $start < $newLimit; $start++){
                                                if (isset($users[$start])){
                                                     // print_r($users[$start]->name);
                                                echo '<tr>';
                                                echo '<td>Avatar</td>';
                                                echo '<td>'.$users[$start]->name.'</td>';
                                                echo '<td>'.$users[$start]->phone.'</td>';
                                                echo '<td>'.$users[$start]->email.'</td>';
                                                echo '<td class="text-end">
                                                <div class="actions">
                                                    <a href="update.php?email='.$users[$start]->email.'" class="btn btn-sm bg-success-light me-2">
                                                        <i class="fe fe-pencil"></i>
                                                    </a>
                                                    <a href="delete.php?id='.$users[$start]->id.'" class="btn btn-sm bg-danger-light">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </div>
                                            </td>';
                                            }
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                    
                                </div>
                                
                            </div>
                            
                        </div>

                    </div>
                    <?php
                    
                                    echo '<div class="paginate">';
                                    for ($page = 1; $page <= $totalPage; $page++){
                                        echo "<a href='admin/user?page=$page'>$page</a>";
                                    }
                                    echo '</div>';
                                    ?>
                </div>
@endsection

