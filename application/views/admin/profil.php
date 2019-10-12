	<div class="row">
  
		<div class="col s12 m12 l12">
			<div id="profile-card" class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="<?= base_url('assets/images/office.jpg')?>" alt="user bg">
				</div>
				<div class="card-content">
					<img src="<?= base_url('assets/images/admin.png')?>" alt="" class="circle responsive-img activator card-profile-image">
					<a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
						<i class="mdi-content-filter-list"></i>
					</a>
					
					<span class="card-title activator grey-text text-darken-4"><?= $admin['name']?></span>
					<p class="grey-text"><i class="mdi-action-perm-identity "></i> <?= $admin['level']?></p>

				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Nama Lengkap Admin <i class="mdi-navigation-close right"></i></span>
					<h5 class="divider"></h5>
                    <p><i class="mdi-communication-contacts"></i> Username Admin</p>
                    <p><i class="mdi-action-perm-identity"></i> Level Admin</p>
					<p><i class="mdi-action-perm-phone-msg"></i> Telepon Admin</p>
					<p><i class="mdi-communication-email"></i> Email Admin</p>
                    <p><i class="mdi-maps-pin-drop"></i> Alamat Admin</p>
                </div>
			</div>
		</div>

    </div>