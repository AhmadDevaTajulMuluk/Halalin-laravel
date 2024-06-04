<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" type="image/jpg" href="../../assets/images/halalin-icon.png">
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"
        ></script>
        <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXlUHEo0E3c36E6d6wJR0LRm1n9C2kjF5xAWYMK6fB2dKpcI/tpIkElgkPyV"
        crossorigin="anonymous"
        ></script>
        <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgH/xrA7iPJdALttHSmHg6up4kD5uLU6LN3o5gBqc5N5KA45q6d"
        crossorigin="anonymous"
        ></script>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
        <style>
            .card:hover {
                transform: none;
            }
            .card {
                cursor: default;
            }
            .alert:hover {
                transform: scale(1.005);
            }
            .alert {
                transition: 0.2s;
                cursor: pointer;
            }
        </style>
		<title>Dashboard</title>
	</head>
	<body>
		<div id="next-page-container" onclick="closeTabNavigator('next-page-container')">
			<div id="next-page">
				<p>Buat akun untuk melanjutkan</p>
				<a href="../views/pages/register.html" class="button">Register</a>
				<p>
					Sudah punya akun?
					<a href="../views/pages/login.html" class="login">Login</a>
				</p>
			</div>
		</div>
		<x-navbarustadz></x-navbarustadz>
        <main id="page-notif">
            <div class="row">
                <div class="col-md-8 offset-md-2" style="margin: 0 50px">
                    <div>
                        <h2 style="text-align: left; padding: 20px">Notifications</h2>
                    </div>
                    <div class="card">
                        <div class="card-body">
                        <!-- Example notifications -->
                            <div class="alert alert-success" role="alert">
                                This is a success notification!
                            </div>
                            <div class="alert alert-info" role="alert">
                                This is an info notification!
                            </div>
                            <div class="alert alert-warning" role="alert">
                                This is a warning notification!
                            </div>
                            <div class="alert alert-info" role="alert">
                                This is an info notification!
                            </div>
                            <div class="alert alert-warning" role="alert">
                                This is a warning notification!
                            </div>
                            <div class="alert alert-danger" role="alert">
                                This is a danger notification!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
		<x-footer></x-footer>
		<script type="text/javascript" src="../../assets/js/script.js"></script>
	</body>
</html>
