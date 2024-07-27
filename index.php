<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/src/style.css">
		<script src="//code.jquery.com/jquery.min.js"></script>
		<script type="text/javascript" src="/src/main.js"></script>
		<title>Name Database</title>
	</head>

	<body onload="setup()">
		<div id="navbar">
		</div>
		<div id="spacer">
		</div>
		
		<div id="loadholder">
			<div id="loader">
			</div>
		</div>
		
		<div id="wrapper">

			<div id="left_side">
			</div>
			
			<div id="content_area">
				<article>
					<section>
						<header>
							<h1>ENTER AND DISPLAY NAMES</h1>
						</header>
						
						<div id="entry" style="display:flex;justify-content: space-between;">
						    <form action="insert.php" method="POST" style="width: 45%;">
						        <p>Enter Names:</p>
                                <p><label for="fName">First Name:</label>
                                <input style="float:right;" type="text" id="fName" name="fName" size="30" required></p>
                                <p><label for="lName">Last Name:</label>
                                <input style="float:right;" type="text" id="lName" name="lName" size="30" required></p>
                                <p><label for="mail">E-Mail:</label>
                                <input style="float:right;" type="text" id="mail" name="mail" size="30" required></p>
                                <button type="submit" name="submit" value="insert">Insert Record</button>
                            </form>
						    <div id="search" style="width: 45%;">
						        <p>Search for Names:</p>
						        <p style="color:#808080;"><br></p>
                                <p><label for="lName2">Last Name:</label>
                                <input style="float:right;" type="text" id="lName2" size="30"></p>
                                <p style="color:#808080;"><br></p>
                                <button onclick="search()">Search</button>
                            </div>
						</div>
						<div id="results">
                            <p id="return"></p>
                            
                            <script>
                                function search() {
                                    let msg = {
                                        "body": document.getElementById('lName2').value
                                    }
                                    
                                    fetch('search.php', {
                                        "method": "POST",
                                        "headers": {
                                            "Content-Type": "application/json; charset=utf-8"
                                        },
                                        "body": JSON.stringify(msg)
                                    }).then(function(response){
                                        return response.text();
                                    }).then(function(data){
                                        console.log(data);
                                        document.getElementById('return').innerHTML = data;
                                    })
                                }
                            </script>
						</div>
						<p></p>
					</section>

				</article>	
			</div>
			
			<nav id="right_side">
            </nav>
			
		</div>
		
		<footer id="main-footer">
			<br>
			<div id="frameholder">
			</div>
		</footer>

	</body>
</html>