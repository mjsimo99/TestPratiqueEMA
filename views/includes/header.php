<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SatoQuiz</title>
	<style>
body {
  margin: 0;
  padding: 0;
}
nav {
  display: flex;
  align-items: center;
  background-color: white;
  color: #fff;
}

.logo-section {
  background-color: orangered;
  padding: 5px;
  width: 100px;
  text-align: center;
  
}

.nav-section ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: flex;
  margin-left: 20px;
  padding: 5px;

}

.down-arrow {
	display: flex;
	align-items: center;
}

.nav-section a {
  color: black;
  text-decoration: none;
  padding: 5px;
  font-family: sans-serif;
  font-size: small;
}

.nav-section a:hover {
  background-color: #555;
}
.navigations{
	display: flex;
	align-items: center;
	flex-direction: column;
	margin-right: 20px;
}
.search-label{
	color: grey;
	font-family: sans-serif;
	font-size: small;
}
.search-input{
	border: none;
	width: 100px;
}
.search-section{
	display: flex;
	align-items: center;
}
.search-folder, .cart {
	margin-right: 20px;
}
.nav-section-search{
	display: flex;
	width: 100%;
	justify-content: space-between;
}
</style>
</head>

<nav>
  <div class="logo-section">
    <a href="#">
	  <img src="../../Satoru-MVC1/views/assets/images/ema.png" alt="logo" width="70px">

    </a>
  </div>
  <div class="nav-section-search">
  <div class="nav-section">
    <ul>
		<div class="navigations">      	
			<svg height="15px" width="15px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M403.166,74.249c-13.439,7.624-29.668,13.939-44.089,11.532c-22.738-3.783-81.345-3.533-120.246,10.609 c-38.901,14.141-109.628,58.346-130.844,65.432c-21.226,7.066-22.989,35.368,24.75,40.663c47.748,5.313,90.182-24.76,100.79-30.055 c10.609-5.313,113.17,10.609,113.17,10.609l32.268,7.951l74.394,100.56c13.053-11.34,38.872-35.406,45.409-53.696 c2.378-6.662,5.919-12.784,9.819-18.224l0.818,1.126C526.916,181.615,451.828,57.075,403.166,74.249z"></path> <path class="st0" d="M359.077,205.585l-15.634-1.578c-20.514-3.177-78.524-11.437-100.309-11.437c-0.952,0-1.713,0.01-2.281,0.038 c-0.876,0.501-1.887,1.078-2.878,1.656c-15.461,9.001-51.656,30.074-93.821,30.074c-4.63,0-9.252-0.26-13.756-0.761 c-6.834-0.76-12.842-1.935-18.156-3.418c5.035,2.205,9.665,5.362,13.641,9.415c6.228,6.373,10.098,14.19,11.629,22.363 c3.63-0.973,7.393-1.512,11.244-1.512c11.802,0,22.834,4.64,31.084,13.073c8.116,8.298,12.525,19.272,12.4,30.882 c0,0.115-0.02,0.232-0.02,0.347c11.744,0.038,22.738,4.678,30.959,13.073c8.125,8.298,12.534,19.272,12.409,30.882 c-0.048,4.004-0.664,7.913-1.742,11.668c8.336,1.742,15.97,5.891,22.073,12.129c16.77,17.145,16.471,44.725-0.664,61.495 l-8.587,8.394c0.038,0,0.087,0,0.125,0c14.411-1.04,26.56-9.934,29.958-23.335c5.872,4.63,13.265,7.412,21.323,7.412 c19.041,0,34.482-15.431,34.482-34.482c0-2.002-0.212-3.947-0.539-5.854c6.066,5.286,13.968,8.51,22.642,8.51 c19.042,0,34.483-15.441,34.483-34.482c4.081,1.703,8.557,2.656,13.255,2.656c19.041,0,34.482-15.441,34.482-34.482 c0-14.459-7.075-23.874-23.873-43.32L359.077,205.585z"></path> <path class="st0" d="M110.72,244.419c-8.606-8.789-22.699-8.944-31.488-0.347l-31.816,31.142 c-8.789,8.597-8.943,22.69-0.346,31.479c8.597,8.789,22.69,8.943,31.48,0.336l31.825-31.132 C119.163,267.301,119.317,253.208,110.72,244.419z"></path> <path class="st0" d="M164.668,278.343c-8.597-8.799-22.69-8.953-31.48-0.347l-42.434,41.51c-8.789,8.606-8.933,22.699-0.336,31.478 c8.596,8.799,22.689,8.952,31.488,0.347l42.424-41.51C173.12,301.225,173.274,287.132,164.668,278.343z"></path> <path class="st0" d="M208.016,322.644c-8.596-8.789-22.689-8.953-31.478-0.346l-42.434,41.519 c-8.789,8.596-8.943,22.689-0.337,31.488c8.597,8.779,22.69,8.934,31.48,0.327l42.434-41.51 C216.469,345.517,216.612,331.423,208.016,322.644z"></path> <path class="st0" d="M240.756,377.323c-8.606-8.789-22.699-8.953-31.478-0.347l-24.751,24.221 c-8.789,8.596-8.943,22.689-0.346,31.478c8.596,8.789,22.699,8.934,31.488,0.347l24.75-24.22 C249.199,400.205,249.353,386.112,240.756,377.323z"></path> <path class="st0" d="M94.798,216.501c3.35,0,6.623,0.424,9.8,1.145c-26.733-10.252-31.161-29.004-31.864-35.618 c-1.887-17.81,9.588-34.03,28.533-40.345c7.625-2.541,27.619-13.439,46.94-23.97c20.736-11.312,43.493-23.72,63.295-32.847 c-25.088-2.03-48.595-1.174-61.158,0.915c-13.507,2.252-28.601-3.148-41.51-10.098C60.171,58.5-14.916,183.039,2.595,222.191 c3.186,4.784,6.046,10.021,8.058,15.663c2.974,8.317,9.943,17.828,17.886,26.8c1.242-1.598,2.561-3.158,4.034-4.612l31.816-31.141 C72.57,220.91,83.361,216.501,94.798,216.501z"></path> </g> </g></svg>
			<div class="down-arrow">
				<li><a href="#">Fournisseurs
					</a>
				</li>
				<svg width="7px" height="7px" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>navigation / 4 - navigation, arrow, chevron, direction, forward, move, down icon</title> <g id="Free-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"> <g transform="translate(-969.000000, -678.000000)" id="Group" stroke="#000000" stroke-width="2"> <g transform="translate(967.000000, 672.000000)" id="Shape"> <polyline points="2.99847739 7.00152261 12.0005807 17.0026841 21.0026841 7.00152261"> </polyline> </g> </g> </g> </g></svg>
			</div>
		</div>
		<div class="navigations">      	
		<svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 19V6.2C4 5.0799 4 4.51984 4.21799 4.09202C4.40973 3.71569 4.71569 3.40973 5.09202 3.21799C5.51984 3 6.0799 3 7.2 3H16.8C17.9201 3 18.4802 3 18.908 3.21799C19.2843 3.40973 19.5903 3.71569 19.782 4.09202C20 4.51984 20 5.0799 20 6.2V17H6C4.89543 17 4 17.8954 4 19ZM4 19C4 20.1046 4.89543 21 6 21H20M9 7H15M9 11H15M19 17V21" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>			
			<div class="down-arrow">
				<li><a href="#">Offre et catalogue
					</a>
				</li>
				<svg width="7px" height="7px" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>navigation / 4 - navigation, arrow, chevron, direction, forward, move, down icon</title> <g id="Free-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"> <g transform="translate(-969.000000, -678.000000)" id="Group" stroke="#000000" stroke-width="2"> <g transform="translate(967.000000, 672.000000)" id="Shape"> <polyline points="2.99847739 7.00152261 12.0005807 17.0026841 21.0026841 7.00152261"> </polyline> </g> </g> </g> </g></svg>
			</div>
		</div>
		<div class="navigations">      	
		<svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css">  .st0{fill:#000000;}  </style> <g> <path class="st0" d="M147.57,320.188c-0.078-0.797-0.328-1.531-0.328-2.328v-6.828c0-3.25,0.531-6.453,1.594-9.5 c0,0,17.016-22.781,25.063-49.547c-8.813-18.594-16.813-41.734-16.813-64.672c0-5.328,0.391-10.484,0.938-15.563 c-11.484-12.031-27-18.844-44.141-18.844c-35.391,0-64.109,28.875-64.109,73.75c0,35.906,29.219,74.875,29.219,74.875 c1.031,3.047,1.563,6.25,1.563,9.5v6.828c0,8.516-4.969,16.266-12.719,19.813l-46.391,18.953 C10.664,361.594,2.992,371.5,0.852,383.156l-0.797,10.203c-0.406,5.313,1.406,10.547,5.031,14.438 c3.609,3.922,8.688,6.125,14.016,6.125H94.93l3.109-39.953l0.203-1.078c3.797-20.953,17.641-38.766,36.984-47.672L147.57,320.188z"></path> <path class="st0" d="M511.148,383.156c-2.125-11.656-9.797-21.563-20.578-26.531l-46.422-18.953 c-7.75-3.547-12.688-11.297-12.688-19.813v-6.828c0-3.25,0.516-6.453,1.578-9.5c0,0,29.203-38.969,29.203-74.875 c0-44.875-28.703-73.75-64.156-73.75c-17.109,0-32.625,6.813-44.141,18.875c0.563,5.063,0.953,10.203,0.953,15.531 c0,22.922-7.984,46.063-16.781,64.656c8.031,26.766,25.078,49.563,25.078,49.563c1.031,3.047,1.578,6.25,1.578,9.5v6.828 c0,0.797-0.266,1.531-0.344,2.328l11.5,4.688c20.156,9.219,34,27.031,37.844,47.984l0.188,1.094l3.094,39.969h75.859 c5.328,0,10.406-2.203,14-6.125c3.625-3.891,5.438-9.125,5.031-14.438L511.148,383.156z"></path> <path class="st0" d="M367.867,344.609l-56.156-22.953c-9.375-4.313-15.359-13.688-15.359-23.969v-8.281 c0-3.906,0.625-7.797,1.922-11.5c0,0,35.313-47.125,35.313-90.594c0-54.313-34.734-89.234-77.594-89.234 c-42.844,0-77.594,34.922-77.594,89.234c0,43.469,35.344,90.594,35.344,90.594c1.266,3.703,1.922,7.594,1.922,11.5v8.281 c0,10.281-6.031,19.656-15.391,23.969l-56.156,22.953c-13.047,5.984-22.344,17.984-24.906,32.109l-2.891,37.203h139.672h139.672 l-2.859-37.203C390.211,362.594,380.914,350.594,367.867,344.609z"></path> </g> </g></svg>	
			<div class="down-arrow">
				<li><a href="#">Clients
					</a>
				</li>
				<svg width="7px" height="7px" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>navigation / 4 - navigation, arrow, chevron, direction, forward, move, down icon</title> <g id="Free-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"> <g transform="translate(-969.000000, -678.000000)" id="Group" stroke="#000000" stroke-width="2"> <g transform="translate(967.000000, 672.000000)" id="Shape"> <polyline points="2.99847739 7.00152261 12.0005807 17.0026841 21.0026841 7.00152261"> </polyline> </g> </g> </g> </g></svg>
			</div>
		</div>
		<div class="navigations">      	
		<svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 13H14M8 17H16M13 3H5V5M13 3H14L19 8V9M13 3V7C13 8 14 9 15 9H19M19 9V12M5 10V21H19V16" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
			<div class="down-arrow">
				<li><a href="#">Commandes
					</a>
				</li>
				<svg width="7px" height="7px" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>navigation / 4 - navigation, arrow, chevron, direction, forward, move, down icon</title> <g id="Free-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"> <g transform="translate(-969.000000, -678.000000)" id="Group" stroke="#000000" stroke-width="2"> <g transform="translate(967.000000, 672.000000)" id="Shape"> <polyline points="2.99847739 7.00152261 12.0005807 17.0026841 21.0026841 7.00152261"> </polyline> </g> </g> </g> </g></svg>
			</div>
		</div>
		
		<div class="navigations">      	
		<svg width="15px" height="15px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M143.04 839.552c43.584 0 79.104-35.52 79.104-79.104v-448a79.168 79.168 0 0 0-158.08 0l-0.064 448c0 43.584 35.456 79.104 79.04 79.104z m-26.368-527.104a26.368 26.368 0 0 1 52.736 0v448a26.368 26.368 0 0 1-52.736 0v-448z m263.552 527.104c43.584 0 79.04-35.52 79.04-79.104V523.264c0-43.52-35.456-79.04-79.04-79.04s-79.04 35.456-79.04 79.04v237.184c0 43.584 35.456 79.104 79.04 79.104zM353.92 523.264a26.368 26.368 0 0 1 52.736 0v237.184a26.368 26.368 0 0 1-52.736 0V523.264z m500.736 316.288c43.584 0 79.04-35.52 79.04-79.104v-158.08c0-43.584-35.456-79.104-79.04-79.104s-79.04 35.52-79.04 79.104v158.08c0 43.584 35.456 79.104 79.04 79.104z m-26.368-237.184a26.368 26.368 0 0 1 52.736 0v158.08a26.368 26.368 0 0 1-52.736 0v-158.08z m-210.816 237.184c43.584 0 79.04-35.52 79.04-79.104V207.04c0-43.52-35.456-79.04-79.04-79.04s-79.04 35.456-79.04 79.04v553.408c0 43.584 35.456 79.104 79.04 79.104z m-26.368-632.512a26.368 26.368 0 0 1 52.736 0v553.408a26.368 26.368 0 0 1-52.736 0V207.04zM64 892.224h896v52.736H64v-52.736z" fill="#000000"></path></g></svg>			
			<div class="down-arrow">
				<li><a href="#">Exploitation
					</a>
				</li>
				<svg width="7px" height="7px" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>navigation / 4 - navigation, arrow, chevron, direction, forward, move, down icon</title> <g id="Free-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"> <g transform="translate(-969.000000, -678.000000)" id="Group" stroke="#000000" stroke-width="2"> <g transform="translate(967.000000, 672.000000)" id="Shape"> <polyline points="2.99847739 7.00152261 12.0005807 17.0026841 21.0026841 7.00152261"> </polyline> </g> </g> </g> </g></svg>
			</div>
		</div>
		<div class="navigations">      	
		<svg fill="#000000" width="15px" height="15px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M 6 3 L 6 29 L 22 29 L 22 27 L 8 27 L 8 5 L 18 5 L 18 11 L 24 11 L 24 13 L 26 13 L 26 9.5996094 L 25.699219 9.3007812 L 19.699219 3.3007812 L 19.400391 3 L 6 3 z M 20 6.4003906 L 22.599609 9 L 20 9 L 20 6.4003906 z M 10 13 L 10 15 L 22 15 L 22 13 L 10 13 z M 27 15 L 27 17 C 25.3 17.3 24 18.7 24 20.5 C 24 22.5 25.5 24 27.5 24 L 28.5 24 C 29.3 24 30 24.7 30 25.5 C 30 26.3 29.3 27 28.5 27 L 25 27 L 25 29 L 27 29 L 27 31 L 29 31 L 29 29 C 30.7 28.7 32 27.3 32 25.5 C 32 23.5 30.5 22 28.5 22 L 27.5 22 C 26.7 22 26 21.3 26 20.5 C 26 19.7 26.7 19 27.5 19 L 31 19 L 31 17 L 29 17 L 29 15 L 27 15 z M 10 18 L 10 20 L 17 20 L 17 18 L 10 18 z M 19 18 L 19 20 L 22 20 L 22 18 L 19 18 z M 10 22 L 10 24 L 17 24 L 17 22 L 10 22 z M 19 22 L 19 24 L 22 24 L 22 22 L 19 22 z"></path></g></svg>
		
					<div class="down-arrow">
				<li><a href="#">Commandes
					</a>
				</li>
				<svg width="7px" height="7px" viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>navigation / 4 - navigation, arrow, chevron, direction, forward, move, down icon</title> <g id="Free-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"> <g transform="translate(-969.000000, -678.000000)" id="Group" stroke="#000000" stroke-width="2"> <g transform="translate(967.000000, 672.000000)" id="Shape"> <polyline points="2.99847739 7.00152261 12.0005807 17.0026841 21.0026841 7.00152261"> </polyline> </g> </g> </g> </g></svg>
			</div>
		</div>
		
		
    </ul>
  </div>
  <div class="search-section">
	<div>
	<label class="search-label" for="search">Rechercher:</label>
	<input class="search-input" type="text">
	</div>
	<svg class="search-folder" width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13 7L11.8845 4.76892C11.5634 4.1268 11.4029 3.80573 11.1634 3.57116C10.9516 3.36373 10.6963 3.20597 10.4161 3.10931C10.0992 3 9.74021 3 9.02229 3H5.2C4.0799 3 3.51984 3 3.09202 3.21799C2.71569 3.40973 2.40973 3.71569 2.21799 4.09202C2 4.51984 2 5.0799 2 6.2V7M2 7H17.2C18.8802 7 19.7202 7 20.362 7.32698C20.9265 7.6146 21.3854 8.07354 21.673 8.63803C22 9.27976 22 10.1198 22 11.8V16.2C22 17.8802 22 18.7202 21.673 19.362C21.3854 19.9265 20.9265 20.3854 20.362 20.673C19.7202 21 18.8802 21 17.2 21H6.8C5.11984 21 4.27976 21 3.63803 20.673C3.07354 20.3854 2.6146 19.9265 2.32698 19.362C2 18.7202 2 17.8802 2 16.2V7ZM15.5 17.5L14 16M15 13.5C15 15.433 13.433 17 11.5 17C9.567 17 8 15.433 8 13.5C8 11.567 9.567 10 11.5 10C13.433 10 15 11.567 15 13.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
	<svg class="cart" width="25px" height="25px" viewBox="0 -1 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>cart</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-466.000000, -726.000000)" fill="#000000"> <path d="M475.97,734 L473.475,726 L467,726 C466.447,726 466,726.448 466,727 C466,727.553 466.447,728 467,728 L472,728 L474.011,734 L474,734 L476,746 C476,748.209 477.791,750 480,750 L491,750 C493.209,750 495,748.209 495,746 L498,734 L475.97,734 L475.97,734 Z M490,752 C488.896,752 488,752.896 488,754 C488,755.104 488.896,756 490,756 C491.104,756 492,755.104 492,754 C492,752.896 491.104,752 490,752 L490,752 Z M480,752 C478.896,752 478,752.896 478,754 C478,755.104 478.896,756 480,756 C481.104,756 482,755.104 482,754 C482,752.896 481.104,752 480,752 L480,752 Z" id="cart" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
  </div>
  </div>

  
</nav>