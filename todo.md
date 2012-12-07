AJAX file upload progress
===============
Abstract:
* JavaScript listener 
	- "choose files" 'change'
	- append progressbars for chosen files to the DOM
* PHP APC helper
	- apc_fetch upload progress from $_POST
	- encode json
	- store in status variable
* AJAX
	- call from controller to update progressbars