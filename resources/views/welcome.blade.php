<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
<script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br />
<div class="container">
 <br />
 <div class="col-md-6" style="margin:0 auto; float:none;">
  <form method="post" action="/save" class="bg-grey shadow-md rounded-md px-8 pt-6 pb-8 mb-4 mt-20">
   <h3 class="font-bold ">T-Shirt order form</h3>
   <br />
   <div class="form-group mt-3">
    <label class="font-semibold">Enter Address</label>
    <input type="text" name="address" placeholder="Enter Address" class="form-control" required />
   </div>
   <div class="form-group mt-3">
    <label class="font-semibold">Enter Email</label>
    <input type="email" name="email" class="form-control" placeholder="Enter Email"  required/>
   </div>
   <div class="form-group mt-3">
    <label class="font-semibold">Select Size</label>
    <select name="size" id="size">
  <option value="S">S</option>
  <option value="M">M</option>
  <option value="L">L</option>
  <option value="XL">XL</option>
</select>
   </div>
   <div class="form-group mt-4">
<input type="checkbox" name="privacy" id="privacy" required ><label for="privacy"> I have read and accept the <a href="https://www.sva.de/de/datenschutz" class="text">Data Privacy Policy</a> </label>
   </div>
   <div class="form-group mt-4 hover:text-blue-800">
    <button type="submit" class="btn btn-info" >Submit</button>
   </div>
  </form>
 </div>
</div>
</body>
</html>
</html>