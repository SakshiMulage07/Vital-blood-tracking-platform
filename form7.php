<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mauli Blood Bank - Donor Form</title>

<!-- jQuery and Validation -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.validate.min.js"></script>

<!-- Custom Validation Script -->
<script>
$(document).ready(function(){
    $("#dform").validate({
        rules: {
            d_name: "required",
            d_cont: {
                required: true,
                minlength: 10,
                number: true
            },
            d_address: "required",
            email: {
                required: true,
                email: true
            },
            d_gender: "required",
            d_bloodgroup: "required",
            d_weight: "required",
            d_age: "required",
            d_date: "required"
        },
        messages: {
            d_name: "Please enter your full name",
            d_cont: {
                required: "Please enter your contact number",
                minlength: "Contact should be 10 digits",
                number: "Please enter a valid number"
            },
            d_address: "Please enter your address",
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            d_gender: "Please select your gender",
            d_bloodgroup: "Please choose a blood group",
            d_weight: "Please enter your weight",
            d_age: "Please enter your age",
            d_date: "Please select a donation date"
        },
        submitHandler: function(form) {
            alert("Data is correct!");
            form.submit();
        }
    });
});
</script>

<!-- Page Styling -->
<style>
    body {
        background: url('bk5.png') no-repeat center center fixed;
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

    h1, h3 {
        margin: 10px 0;
    }

    img {
        width: 100px;
        height: auto;
        border-radius: 8px;
        margin-bottom: 10px;
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
        cursor: pointer;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }

    input[type="reset"]:hover,
    button[type="submit"]:hover,
    .back-btn a:hover {
        background: #cc0000;
        transform: scale(1.05);
    }

    .back-btn {
        margin-top: 15px;
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
</style>
</head>

<body>
    <div class="form-container">
        <img src="logo.jpeg" alt="Mauli Blood Bank Logo">
        <h1>Mauli Blood Bank</h1>
        <h3><i>"A bit of blood can save a life!"</i></h3>
        <hr>
        <h2>Blood Donation Form</h2>
        <p><i>Enter your personal details below</i></p>

        <form id="dform" action="insert.php" method="post">
            <input type="text" name="d_name" placeholder="Enter donor name"><br>
            <input type="text" name="d_cont" placeholder="Enter contact"><br>
            <input type="text" name="email" placeholder="Enter donor email"><br>
            <input type="text" name="d_address" placeholder="Enter address"><br>

            <div>
                <label><input type="radio" name="d_gender" value="Male"> Male</label>
                <label><input type="radio" name="d_gender" value="Female"> Female</label>
            </div>

            <select name="d_bloodgroup">
                <option value="">Select Blood Group</option>
                <option>AB+</option><option>AB-</option>
                <option>A+</option><option>A-</option>
                <option>B+</option><option>B-</option>
                <option>O+</option><option>O-</option>
            </select><br>

            <input type="text" name="d_weight" placeholder="Enter weight (kg)"><br>
            <input type="text" name="d_age" placeholder="Enter age"><br>

            <label>Date of Donation:</label><br>
            <input type="date" name="d_date"><br>

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

