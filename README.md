# CodeRogue

Database Name: CodeRogue1
Table: login
	Columns: rollnumber ->type INT
			password ->type VARCHAR
			username -> type VARCHAR

Table Data
rollnumber		password		username
21327			hello			Saransh Baniyal
21310			hello			Deepak Sharma
21215			hello			Dhruv Shrivastava


Table: gatesession
	Columns:



passing data from php to javascript
<script>
    var data = <?php echo $_SESSION['rollnumber']; ?>; // Don't forget the extra semicolon!
    console.log(data);
</script>