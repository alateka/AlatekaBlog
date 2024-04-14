# DEV
dev:
	./tailwindcss -i app/Views/css/input.css -o public/css/app.css --watch

# PRO
pro:
	./tailwindcss -i app/Views/css/input.css -o public/css/app.css --minify