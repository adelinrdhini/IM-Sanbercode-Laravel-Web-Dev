<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Book</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <h2>Sign Up Form</h2>
    <form action="/welcome" method="POST">
        @csrf
        <label>First Name:</label> <br>
        <input type="text" name="FirstName" required> <br> <br>
        <label>Last Name:</label> <br>
        <input type="text" name="LastName" required> <br> <br>
        <label>Gender:</label> <br> <br>
        <input type="radio" name="Gender"> Male <br>
        <input type="radio" name="Gender"> Female <br>
        <input type="radio" name="Gender"> Other <br> <br>
        <label>Nationality:</label> <br>
        <select name="Nationality"> 
            <option value="Indonesian">Indonesian</option>
            <option value="Singaporean">Singaporean</option>
            <option value="Korean">Korean</option>
            <option value="Japanese">Japanese</option>
        </select> <br> <br>
        <label>Language Spoken:</label> <br> <br>
        <input type="checkbox" name="Bahasa Indonesia"> Bahasa Indonesia <br>
        <input type="checkbox" name="English"> English <br>
        <input type="checkbox" name="Other"> Other <br> <br>
        <label>Bio</label> <br>
        <textarea rows="10" cols="40"> </textarea> <br> <br>

        <input type="submit" value="signup"> <br> <br>
    </form>
</body>
</html>