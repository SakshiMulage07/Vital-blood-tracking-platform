<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mauli Blood Bank - Receiver Registration</title>

<!-- jQuery & Validation -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.validate.min.js"></script>

<script>
$(document).ready(function(){
    $("#rform").validate({
        rules: {
            r_name: "required",
            r_cont: {
                required: true,
                minlength: 10,
                number: true
            },
            r_address: "required",
            email: {
                required: true,
                email: true
            },
            r_gender: "required",
            r_bloodgroup: "required",
            r_weight: "required",
            r_age: "required",
            r_date: "required"
        },
        messages: {
            r_name: "Please enter full name",
            r_cont: {
                required: "Please enter contact number",
                minlength: "Contact should be 10 digits",
                number: "Please enter a valid number"
            },
            r_address: "Please enter address",
            email: {
                required: "Please enter email",
                email: "Please enter a valid email"
            },
            r_gender: "Please select gender",
            r_bloodgroup: "Please choose blood group",
            r_weight: "Please enter weight",
            r_age: "Please enter age",
            r_date: "Please select date"
        },
        submitHandler: function(form) {
            alert("Data is correct!");
            form.submit();
        }
    });
});
</script>

<!-- Styling -->
<style>
    body {
        background: url('bk6.png.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: Arial, sans-serif;
        color: #fff;
        margin: 0;
        padding: 0;
    }

    .form-container {
        background: rgba(0, 0, 0, 0.7);
        width: 50%;
        margin: 50px auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px #ff4d4d;
        text-align: center;
    }

    img {
        width: 100px;
        height: auto;
        margin-bottom: 15px;
    }

    h1, h3 {
        margin: 10px 0;
        color: #ffcccc;
    }

    input, select, button {
        width: 80%;
        padding: 10px;
        margin: 10px 0;
        border-radius: 5px;
        border: none;
        font-size: 16px;
    }

    input[type="radio"] {
        width: auto;
        margin: 0 5px;
    }

    input[type="reset"], button[type="submit"], .back-btn a {
        background: #ff4d4d;
        color: white;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
        cursor: pointer;
    }

    input[type="reset"]:hover,
    button[type="submit"]:hover,
    .back-btn a:hover {
        background: #cc0000;
        transform: scale(1.05);
    }

    label.error {
        color: #ff8080;
        font-size: 14px;
        display: block;
        margin-top: -5px;
    }

    hr {
        border: 1px solid #ff4d4d;
        width: 80%;
        margin: 20px auto;
    }

    .back-btn {
        margin-top: 20px;
    }
</style>
</head>

<body>
    <div class="form-container">
        <img src="logo1.png" alt="Mauli Blood Bank Logo">
        <h1>Mauli Blood Bank</h1>
        <h3><i>"A bit of blood can save a life!"</i></h3>
        <hr>
        <h2>Receiver Registration Form</h2>
        <p><i>Enter your personal details below</i></p>

        <form id="rform" action="rinsert.php" method="post">
            <input type="text" name="r_name" placeholder="Enter receiver name"><br>
            <input type="text" name="r_cont" placeholder="Enter contact number"><br>
            <input type="text" name="r_address" placeholder="Enter address"><br>
            <input type="text" name="email" placeholder="Enter receiver email"><br>

            <div>
                <label><input type="radio" name="r_gender" value="Male"> Male</label>
                <label><input type="radio" name="r_gender" value="Female"> Female</label>
            </div>

            <select name="r_bloodgroup">
                <option value="">Select Blood Group</option>
                <option>AB+</option>
                <option>AB-</option>
                <option>A+</option>
                <option>A-</option>
                <option>B+</option>
                <option>B-</option>
                <option>O+</option>
                <option>O-</option>
            </select><br>

            <input type="text" name="r_weight" placeholder="Enter weight (kg)"><br>
            <input type="text" name="r_age" placeholder="Enter age"><br>

            <label>Date of Requirement:</label><br>
            <input type="date" name="r_date"><br>

            <input type="reset" value="Reset Form">
            <button type="submit">Submit</button>

            <h3>Already Registered?</h3>
            <h3>Thank you for submitting your form!</h3>

            <div class="back-btn">
                <a href="home7.php">← Back to Home</a>
            </div>
        </form>
    </div>
</body>
</html>
