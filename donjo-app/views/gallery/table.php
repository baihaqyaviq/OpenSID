<script>
	$(function() {
		var keyword = <?php echo $keyword?> ;
		$( "#cari" ).autocomplete({
			source: keyword
		});
	});
</script>
<script src="<?php echo base_url()?>assets/front/js/jquery.colorbox.js"></script>
<script>
	$(document).ready(function(){
		$(".color2").colorbox({rel:'color2', transition:"fade"});
	});
</script>
<link type='text/css' href="<?php echo base_url()?>assets/front/css/colorbox.css" rel='Stylesheet' />
<div id="pageC">
<table class="inner">
<tr style="vertical-align:top">
	<td style="background:#fff;padding:0px;">
<div class="content-header">
    <h3>Manajemen Galeri</h3>
</div>
<div id="contentpane">
	<form id="mainform" name="mainform" action="" method="post">
    <div class="ui-layout-north panel">
        <div class="left">
            <div class="uibutton-group">
                <a href="<?php echo site_url('gallery/form')?>" class="uibutton tipsy south" title="Tambah Data" ><span class="fa fa-plus-square">&nbsp;</span>Tambah Album Baru</a>
							<?php if($_SESSION['grup']<4){?>
                <button type="button" title="Hapus Data" onclick="deleteAllBox('mainform','<?php echo site_url("gallery/delete_all/$p/$o")?>')" class="uibutton tipsy south"><span class="fa fa-trash">&nbsp;</span>Hapus Data
							<?php } ?>
            </div>
        </div>
    </div>
    <div class="ui-layout-center" id="maincontent" style="padding: 5px;">
        <div class="table-panel top">
            <div class="left">
                <select name="filter" onchange="formAction('mainform','<?php echo site_url('gallery/filter')?>')">
                    <option value="">Semua</option>
                    <option value="1" <?php if($filter==1) :?>selected<?php endif?>>Aktif</option>
                    <option value="2" <?php if($filter==2) :?>selected<?php endif?>>Non-aktif</option>
                </select>
            </div>
            <div class="right">
                <input name="cari" id="cari" type="text" class="inputbox help tipped" size="20" value="<?php echo $cari?>" title="Cari.." onkeypress="if (event.keyCode == 13) {$('#'+'mainform').attr('action','<?php echo site_url('gallery/search')?>');$('#'+'mainform').submit();}" />
                <button type="button" onclick="$('#'+'mainform').attr('action','<?php echo site_url('gallery/search')?>');$('#'+'mainform').submit();" class="uibutton tipsy south"  title="Cari Data"><span class="fa fa-search">&nbsp;</span>Cari</button>
            </div>
        </div>
        <table class="list">
		<thead>
            <tr>
                <th>No</th>
                <th><input type="checkbox" class="checkall"/></th>
                <th style="width: 150px;">Aksi</th>

	 		<?php  if($o==2): ?>
				<th align="left"><a href="<?php echo site_url("gallery/index/$p/1")?>">Nama Album<span class="ui-icon ui-icon-triangle-1-n">
			<?php  elseif($o==1): ?>
				<th align="left"><a href="<?php echo site_url("gallery/index/$p/2")?>">Nama Album<span class="ui-icon ui-icon-triangle-1-s">
			<?php  else: ?>
				<th align="left"><a href="<?php echo site_url("gallery/index/$p/1")?>">Nama Album<span class="ui-icon ui-icon-triangle-2-n-s">
			<?php  endif; ?>&nbsp;</span></a></th>

			<?php  if($o==4): ?>
				<th align="left"><a href="<?php echo site_url("gallery/index/$p/3")?>">Aktif / Non-aktif<span class="ui-icon ui-icon-triangle-1-n">
			<?php  elseif($o==3): ?>
				<th align="left"><a href="<?php echo site_url("gallery/index/$p/4")?>">Aktif / Non-aktif<span class="ui-icon ui-icon-triangle-1-s">
			<?php  else: ?>
				<th align="left"><a href="<?php echo site_url("gallery/index/$p/3")?>">Aktif / Non-aktif<span class="ui-icon ui-icon-triangle-2-n-s">
			<?php  endif; ?>&nbsp;</span></a></th>

			<?php  if($o==6): ?>
				<th align="left" width='150'><a href="<?php echo site_url("gallery/index/$p/5")?>">Diupload pada<span class="ui-icon ui-icon-triangle-1-n">
			<?php  elseif($o==5): ?>
				<th align="left" width='150'><a href="<?php echo site_url("gallery/index/$p/6")?>">Diupload pada<span class="ui-icon ui-icon-triangle-1-s">
			<?php  else: ?>
				<th align="left" width='150'><a href="<?php echo site_url("gallery/index/$p/5")?>">Diupload pada<span class="ui-icon ui-icon-triangle-2-n-s">
			<?php  endif; ?>&nbsp;</span></a></th>

			</tr>
		</thead>
		<tbody>
        <?php foreach($main as $data){?>
		<tr>
			<td align="center" width="2"><?php echo $data['no']?></td>
			<td align="center" width="5">
				<input type="checkbox" name="id_cb[]" value="<?php echo $data['id']?>" />
			</td>
			<td>
				<div class="uibutton-group">
					<a href="<?php echo site_url("gallery/sub_gallery/$data[id]")?>" class="uibutton tipsy south" title="Rincian Sub Gallery"><span class="fa fa-search-plus"></span> Rincian</a>
					<a href="<?php echo site_url("gallery/form/$p/$o/$data[id]")?>" class="uibutton tipsy south" title="Ubah Data"><span class="fa fa-edit"></span></a>
					<?php if($data['slider'] == '1'):?>
						<a href="<?php echo site_url('gallery/slider_off/'.$data['id'])?>" class="uibutton tipsy south" title="Keluarkan dari slider"><span class="fa fa-play"></span></a>
					<?php else : ?>
						<a href="<?php echo site_url('gallery/slider_on/'.$data['id'])?>" class="uibutton tipsy south" title="Tampilkan di slider"><span class="fa fa-eject"></span></a>
					<?php endif?>
					<?php if($_SESSION['grup']<4){?>
						<a href="<?php echo site_url("gallery/delete/$p/$o/$data[id]")?>" class="uibutton tipsy south" title="Hapus Data" target="confirm" message="Apakah Anda Yakin?" header="Hapus Data"><span class="fa fa-trash"><span></a>
						<?php if($data['enabled'] == '2'):?>
							<a href="<?php echo site_url('gallery/gallery_lock/'.$data['id'])?>" class="uibutton tipsy south" title="Aktivasi gallery"><span  class="fa fa-lock"></span></a>
						<?php elseif($data['enabled'] == '1'): ?>
							<a href="<?php echo site_url('gallery/gallery_unlock/'.$data['id'])?>" class="uibutton tipsy south" title="Non-aktifkan gallery"><span class="fa fa-unlock"></span></a>
						<?php endif?>
					<?php } ?>
				</div>

			  </td>
			  <td>
				<label class="tipsy west" title="<img width=200 height=134 src=<?php echo AmbilGaleri($data['gambar'], 'kecil') ?>>"><?php echo $data['nama']?></label>
			  </td>
			  <td><?php echo $data['aktif']?></td>
			  <td><?php echo tgl_indo2($data['tgl_upload'])?></td>
		</tr>
        <?php }?>
		</tbody>
    </table>
    </div>
	</form>
    <div class="ui-layout-south panel bottom">
        <div class="left">
		<div class="table-info">
          <form id="paging" action="<?php echo site_url('gallery')?>" method="post">
		  <label>Tampilkan</label>
            <select name="per_page" onchange="$('#paging').submit()" >
              <option value="20" <?php  selected($per_page,20); ?> >20</option>
              <option value="50" <?php  selected($per_page,50); ?> >50</option>
              <option value="100" <?php  selected($per_page,100); ?> >100</option>
            </select>
            <label>Dari</label>
            <label><strong><?php echo $paging->num_rows?></strong></label>
            <label>Total Data</label>
          </form>
          </div>
        </div>
        <div class="right">
            <div class="uibutton-group">
            <?php  if($paging->start_link): ?>
				<a href="<?php echo site_url("gallery/index/$paging->start_link/$o")?>" class="uibutton"  ><span class="fa fa-fast-backward"></span> Awal</a>
			<?php  endif; ?>
			<?php  if($paging->prev): ?>
				<a href="<?php echo site_url("gallery/index/$paging->prev/$o")?>" class="uibutton"  ><span class="fa fa-step-backward"></span> Prev</a>
			<?php  endif; ?>
            </div>
            <div class="uibutton-group">

				<?php  for($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
				<a href="<?php echo site_url("gallery/index/$i/$o")?>" <?php  jecho($p,$i,"class='uibutton special'")?> class="uibutton"><?php echo $i?></a>
				<?php  endfor; ?>
            </div>
            <div class="uibutton-group">
			<?php  if($paging->next): ?>
				<a href="<?php echo site_url("gallery/index/$paging->next/$o")?>" class="uibutton">Next <span class="fa fa-step-forward"></span></a>
			<?php  endif; ?>
			<?php  if($paging->end_link): ?>
                <a href="<?php echo site_url("gallery/index/$paging->end_link/$o")?>" class="uibutton">Akhir <span class="fa fa-fast-forward"></span></a>
			<?php  endif; ?>
            </div>
        </div>
    </div>
</div>
</td>
</tr>
</table>
</div>
