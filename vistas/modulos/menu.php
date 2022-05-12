<aside class="main-sidebar">
	 <section class="sidebar">
		<ul class="sidebar-menu">
			<?php

				if ($_SESSION["perfil"] == "Administrador") {
					echo '

						<li class="active">
								<a href="inicio"><i class="fa fa-home"></i><span>Inicio</span></a>
						</li>

						<li>
							<a href="usuarios"><i class="fa fa-lock"></i><span>Usuarios</span></a>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-users"></i>
								<span>Integrantes</span>
								<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
							</a>
			
							<ul class="treeview-menu">
								<li>
									<a href="pilotos">
										<i class="fa fa-circle-o"></i><span style="color:white;">Pilotos</span>
									</a>
								</li>

								<li>
									<a href="vehiculos">
										<i class="fa fa-circle-o"></i><span style="color:white;">Vehiculos</span>
									</a>
								</li>

								<li>
									<a href="pagos">
										<i class="fa fa-circle-o"></i><span style="color:white;">Pagos</span>
									</a>
								</li>
			
			
			

							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-motorcycle"></i>
								<span>Rodadas</span>
								<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
							</a>
			
							<ul class="treeview-menu">
								<li>
									<a href="rodadas">
										<i class="fa fa-road"></i><span style="color:white;">Rodadas/Rutas</span>
									</a>
								</li>

								<li>
									<a href="asistentes">
										<i class="fa fa-user-plus"></i><span style="color:white;">Asistentes</span>
									</a>
								</li>

							</ul>
						</li>
					';
				}
			
			?>

			<?php 

				if ($_SESSION["perfil"] == "Piloto" )  {
					echo '
						
						<li class="active">
								<a href="inicio"><i class="fa fa-home"></i><span>Inicio</span></a>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-users"></i>
								<span>Datos Personales</span>
								<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
							</a>
			
							<ul class="treeview-menu">
								<li>
									<a href="pilotos">
										<i class="fa fa-circle-o"></i><span style="color:white;">Inf Personal</span>
									</a>
								</li>

								<li>
									<a href="vehiculos">
										<i class="fa fa-circle-o"></i><span style="color:white;">Mis Vehiculos</span>
									</a>
								</li>

								<li>
									<a href="pagos">
										<i class="fa fa-circle-o"></i><span style="color:white;">Mis Aportes</span>
									</a>
								</li>

							</ul>
						</li>
					
					';

				}

			?>


		</ul>
	 </section>
</aside>