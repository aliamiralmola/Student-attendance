<?php 
include_once "templates/header.php";
?>
	<div id="time-bar" class="time-bar">
	  <div class="daycell"> اليــــــوم </div>
      <div>8:30</div>
      <!-- <div>8:45</div> -->
      <div>9:00</div>
      <!-- <div>9:15</div> -->
      <div>9:30</div>
      <!-- <div>9:45</div> -->
      <div>10:00</div>
      <!-- <div>10:15</div> -->
      <div>10:30</div>
      <!-- <div>10:45</div> -->
      <div>11:00</div>
      <!-- <div>11:15</div> -->
      <div>11:30</div>
      <!-- <div>11:45</div> -->
      <div>12:00</div>
      <!-- <div>12:15</div> -->
      <div>12:30</div>
      <!-- <div>12:45</div> -->
      <div>1:00</div>
      <!-- <div>1:15</div> -->
      <div>1:30</div>
      <!-- <div>1:45</div> -->
      <div>2:00</div>
      <!-- <div>2:15</div> -->
      <!-- <div>2:30</div> -->
    </div>
	<!--  -->
	<!--  -->
	<!--  -->
			<div id="time-bar1" class="hidden time-bar">
				<div class="daycell"> اليــــــوم </div>
				<div>8:30</div>
				<div>9:00</div>
				<div>9:30</div>
				<div>10:00</div>
				<div>10:30</div>
				<div>11:00</div>
				<div>11:30</div>
				<div>12:00</div>
				<div>12:30</div>
				<div>1:00</div>
				<div>1:30</div>
				<div>2:00</div>
			</div>
			<script>
				onmousemove = (e) => {
					var ll = document.getElementById('time-bar1');
					var pn = this.event.target;
					if( pn.className == 'cell' ){
						for( ; ; ){
							if( pn.className == 'table6' ){
								break;
							}else{
								pn = pn.parentNode;
							}
						}
					}
					// e.clientY > 292 && e.clientY < 478 
					if( pn.className == 'table6' ){
						ll.style.top = e.clientY - 225 + "px";
					}
				}
			</script>
	<div class="table6">
		<div class="row">
			<div class="daycell p-1 border"> أ </div>
			<div class="cell" id="cell11"></div>
			<div class="cell" id="cell12"></div>
			<div class="cell" id="cell13"></div>
			<div class="cell" id="cell14"></div>
		</div>
		<div class="row">
			<div class="daycell p-1 border"> إث </div>
			<div class="cell" id="cell21">خلية 2-1</div>
			<div class="cell" id="cell22">خلية 2-2</div>
			<div class="cell" id="cell23">خلية 2-3</div>
			<div class="cell" id="cell24">خلية 2-4</div>
		</div>
		<div class="row">
			<div class="daycell p-1 border">ث</div>
			<div class="cell" id="cell31">خلية 3-1</div>
			<div class="cell" id="cell32">خلية 3-2</div>
			<div class="cell" id="cell33">خلية 3-3</div>
			<div class="cell" id="cell34">خلية 3-4</div>
		</div>
		<div class="row">
			<div class="daycell p-1 border">أر</div>
			<div class="cell" id="cell31">خلية 3-1</div>
			<div class="cell" id="cell32">خلية 3-2</div>
			<div class="cell" id="cell33">خلية 3-3</div>
			<div class="cell" id="cell34">خلية 3-4</div>
		</div>
		<div class="row">
			<div class="daycell p-1 border">خ</div>
			<div class="cell" id="cell31">خلية 3-1</div>
			<div class="cell" id="cell32">خلية 3-2</div>
			<div class="cell" id="cell33">خلية 3-3</div>
			<div class="cell" id="cell34">خلية 3-4</div>
		</div>
	</div>

	<script>
		let currentCell = null;
		let startX, startWidth;

		let cells = document.querySelectorAll('.cell');
		cells.forEach(cell => {
			cell.addEventListener('mousedown', event => {
				currentCell = event.target;
				startX = event.pageX;
				startWidth = currentCell.offsetWidth;
			});
		});

		document.addEventListener('mousemove', event => {
			if (currentCell && this.event.target.className == 'cell') {
				let diffX = event.pageX - startX;
				let newWidth = startWidth - diffX;
				currentCell.style.width = newWidth + 'px';
				currentCell.style.flex = 'none';
				currentCell.nextElementSibling.style.flexGrow = 1
            }
	});

	document.addEventListener('mouseup', () => {
		currentCell = null;
	});
</script>
<?php
include_once "templates/footer.php";
?>