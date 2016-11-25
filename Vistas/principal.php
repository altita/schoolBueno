

	<link rel="stylesheet" href="email/style.css">

<body>
	<div id="page-wrapper">




		<form id="ajax-contact" method="post" action="email/mailer.php">
			<div class="field">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" required>
			</div>

			<div class="field">
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>
			</div>

			<div class="field">
				<label for="message">Message:</label>
				<textarea id="message" name="message" required></textarea>
			</div>

			<div class="field">
				<button type="submit">Enviar</button>
			</div>
			<div id="form-messages"></div>
		</form>
	</div>

	<script src="jquery-2.1.0.min.js"></script>
	<script src="email/app.js"></script>
</body>
</html>
