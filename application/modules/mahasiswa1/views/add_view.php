<script type="text/javascript">
var url;

function create(){
	jQuery('#dialog-form').dialog('open').dialog('setTitle','Tambah');
	jQuery('#form').form('clear');
	url = '<?php echo site_url('mahasiswa/create'); ?>';
}

function update(){
	var row = jQuery('#datagrid-crud').datagrid('getSelected');
	if(row){
		jQuery('#dialog-form').dialog('open').dialog('setTitle','Edit');
		jQuery('#form').form('load',row);
		url = '<?php echo site_url('mahasiswa/update'); ?>/' + row.nim;
	}
}

function save(){
	jQuery('#form').form('submit',{
		url: url,
		onSubmit: function(){
			return jQuery(this).form('validate');
		},
		success: function(result){
			var result = eval('('+result+')');
			if(result.success){
				jQuery('#dialog-form').dialog('close');
				jQuery('#datagrid-crud').datagrid('reload');
			} else {
				jQuery.messager.show({
					title: 'Error',
					msg: result.msg
				});
			}
		}
	});
}

function hapus(){
	var row = jQuery('#datagrid-crud').datagrid('getSelected');
	if (row){
		jQuery.messager.confirm('Confirm','Yakin mau di hapus',function(r){
			if (r){
				jQuery.post('<?php echo site_url('mahasiswa/delete'); ?>',{nim:row.nim},function(result){
					if (result.success){
						jQuery('#datagrid-crud').datagrid('reload');
					} else {
						jQuery.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				},'json');
			}
		});
	}
}
</script>

<!-- Data Grid -->
<table id="datagrid-crud" title="Mahasiswa" class="easyui-datagrid"
       style="width:auto; height: auto;" url="<?php echo site_url('mahasiswa/index'); ?>?grid=true"
       toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">
	<thead>
		<tr>
			<th field="nim" width="50" sortable="true">Nim</th>
			<th field="nama" width="70" sortable="true">Nama</th>
                        <th field="tmp_lahir" width="30" sortable="true">Tempat /</th>
                        <th field="tgl_lahir" width="30" sortable="true">TGL Lahir</th>
			<th field="jenkel" width="30" sortable="true">Gender</th>
			<th field="prodi" width="50" sortable="true">Prodi</th>
                        <th field="alamat" width="50" sortable="true">Alamat</th>
                        <th field="telpon" width="50" sortable="true">Telpon</th>
                        <th field="email" width="40" sortable="true">Email</th>
		</tr>
	</thead>
</table>

<!-- Toolbar -->
<div id="toolbar">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="create()">Tambah Mahasiswa </a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="update()">Edit</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus()">Hapus</a>
</div>

<!-- Dialog Form -->
<div id="dialog-form" class="easyui-dialog" style="height:480px; padding:10px 20px " closed="true" buttons="#dialog-buttons">
	<form id="form" method="post" novalidate>
         <table cellpadding="5">
             <tr>
                 <td>Nim:</td>
                 <td><input type="text" name="nim" class="easyui-validatebox" required="true" size="40" maxlength="50" /></td>
            </tr>
            <tr>
                 <td>Nama:</td>
                 <td><input type="text" name="nama" class="easyui-validatebox" required="true" size="53" maxlength="50" /></td>
            </tr>
                <tr>
		<td>JenisKelamin:</td>
                 <td><select class="easyui-combobox" name="jenkel"><option value="L">Laki-Laki</option><option value="P">Perempuan</option></select></td>
                         
                </tr>
                 <tr>
                     <td>TempatLahir:</td>
                     <td><input type="text" name="tmp_lahir" class="easyui-validatebox" required="true" size="20" maxlength="20" /></td>
                    
                </tr>
                <tr>
                    <td>TanggalLahir:</td>
                    <td><input type="text"name="tgl_lahir" class="easyui-datebox textbox"></td>
                </tr>
                <tr>
			<td>Prodi:</td>
			<td><input type="text" name="prodi" class="easyui-validatebox" required="true" size="53" maxlength="50" /></td>
                </tr>
                <tr>
			<td>Alamat:</td>
                        <td><input type="textarea" name="alamat" class="easyui-validatebox" required="true" size="53" maxlength="50" /></td>
                </tr>
                <tr>
			<td>Telpon</td>
			<td><input type="phone" name="telpon" class="easyui-validatebox" required="true" size="53" maxlengtmh="12" /></td>
                </tr>
                <tr>
			<td>Email</td>
			<td><input type="text" name="email" class="easyui-validatebox" required="true" validType="email" size="53"  maxlengtmh="50"/></td>
                </tr>
         </table>
            <div id="dialog-buttons">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="save()">simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:jQuery('#dialog-form').dialog('close')">batal</a>
        </div>
	</form>
        

</div>     

<!-- Dialog Button -->
