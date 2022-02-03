<?php
 $conn= mysqli_connect('localhost', 'root', '', 'mydb');
if (!$conn) {
    die('Connection error : ' . mysqli_connect_error());
}
if (isset($_POST['book_ticket'])) {
    $id = $_POST['bookid'];
    $name = $_POST['name'];
    $seat_no = $_POST['seatno'];
    $date = $_POST['bookd'];
    $no_seat = $_POST['no'];

    $err_msg .= (empty($name)) ? '<p>Please enter  movie name</p>' : '';
    $sql="insert into movie(bookid,movie_name,seatno,book_date,no_of_seats)  values('$id','$name','$seat_no','$date','$no_seat')";
    if(mysqli_query($conn,$sql)){
 	echo "Tickets booked successfully";
 }
 else{
 	echo 'Error'.mysqli_error($conn);
 }

    }
 $qry = 'SELECT * from movie';
$tickets_records = mysqli_query($conn, $qry);

 ?>

<title>Movie Ticket Booking</title>

<body>
<center><h3>Movie Ticket Booking</h3></center>

    <div class="container">

        <div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>Movie Name</th>
                        <th>Seat Number</th>
                        <th>Booked Date</th>
                        <th>Number of seats</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($tickets = mysqli_fetch_array($tickets_records)) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $tickets['bookid'] ?></td>
                            <td><?= $tickets['movie_name'] ?></td>
                            <td><?= $tickets['seatno'] ?></td>
                            <td><?= $tickets['book_date'] ?></td>
                            <td><?= $tickets['no_of_seats'] ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <div>

<html>
  <title>Movie Ticket Booking System</title>
  <body>
  <form method="post">
  	<table>
  		<tr>
              <td><label for="lname">Book id</label></td>
               <td> <input type="text" id="full_name" name="bookid"  required><br></td></tr>

              <tr><td>  <label for="lname">Movie Name</label></td>
               <td>  <input type="text" id="m_name" name="name"  required></td></tr><br>

              <tr>
                <td><label for="lname">Seat No</label></td>
               <td> <input type="number" id="seat_no" name="seatno" ></td></tr><br>

                <tr>
                <td><label for="lname">Book Date</label></td>
                <td>  <input type="date" id="book_d" name="bookd"  required></td></tr><br>

               <tr>
                <td><label for="lname">No Of Seats</label></td>
                <td><input type="number" id="num" name="no"  required></td></tr><br>



               <tr><td> <input type="submit" name="book_ticket" value="Book ticket"></td></tr></table>
                
    <style>
    	table {
    		margin: auto;
    		border-spacing: 25px;
    		border-style: insert;
    	}
</style>