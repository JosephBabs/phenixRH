<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">

					<ul class="nav nav-primary">
						<li class="nav-item ">
							<a href="{{ route('employees.dashboard') }}" class="sidebar-links">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>

						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Gestion des Employés</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Employés</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('employees.index') }}" class="sidebar-links">
											<span class="sub-item">Ajouter un employé</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Liste des employés</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Paiement</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('paiements.create')  }}" class="sidebar-links">
											<span class="sub-item">Payer un employé</span>
										</a>
									</li>
                                    <li>
										<a href="{{ route('payments.index')  }}" class="sidebar-links">
											<span class="sub-item">Liste de paies</span>
										</a>
									</li>
								</ul>
							</div>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
