<doctype html>
<html>
  <head>
    <link href="file:///var/www/html/socializer/fonte/indieflower-demo.html" rel="font"/>
    <link rel="stylesheet" href="./css/barra.css">
    <script src="./js/jquery.min.js"></script>
    <script>

			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-5').removeClass('active');
				});

			});

		</script>
  </head>
  <?php
    include("db.php");

    $select = mysqli_query ($conexao,'SELECT user FROM usuario');
    $linha = mysqli_fetch_array($select);
    ?>
    <div class="topo">
      <a id="nome_site" href="http://localhost/socializer/home.php">SOCIALIZER</a>
      <section class="main">
				<div class="wrapper-demo">
					<div id="dd" class="wrapper-dropdown-5" tabindex="1"><?php echo $unome;?>
						<ul class="dropdown">
							<li><a href="#"><i class="icon-user"></i>Profile</a></li>
							<li><a href="#"><i class="icon-cog"></i>Settings</a></li>
							<li><a href="logout.php"><i class="icon-remove"></i>Log out</a></li>
						</ul>
					</div>
				​</div>
			</section>
    </div>
  </body>
</html>
