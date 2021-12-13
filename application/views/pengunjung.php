<div class="container-fluid">
    <div class="row">
        <div class="col w-75">
            <br>
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="mytable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Waktu Datang</th>
                                    <th>Waktu Keluar</th>
                                    <th class="text-center">Aksi</th>
                                    
                                </tr>
                            </thead>
                            <tbody class="show_ktp">
                           
                            </tbody> 
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit tamu -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary ml-4 mt-3" data-toggle="modal" data-target="#ModalEdit">
  Edit
</button>

<div class="modal fade bd-example-modal-lg" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tamu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="input1">NIK</label>
                            <input type="text" name="nik" class="form-control nik" id="input1" disabled>
                        </div>
                        <div class="form-group">
                            <label for="input2">Nama</label>
                            <input type="text" name="nama" class="form-control nama" id="input2" disabled>
                        </div>
                        <div class="form-group">
                            <label for="input3">Tempat Tanggal Lahir</label>
                            <input type="text" name="ttl" class="form-control ttl" id="input3" disabled>
                        </div>
                        <div class="form-group">
                            <label for="input4">Alamat</label>
                            <textarea name="alamat" class="form-control alamat" id="input4" rows="5" disabled></textarea>
                        </div>
                        <div class="form-group">
                            <label for="input5">Agama</label>
                            <input type="text" name="agama" class="form-control agama" id="input5" disabled>
                        </div>
                        <div class="form-group">
                            <label for="input6">Status Kawin</label>
                            <input type="text" name="status_kawin" class="form-control status_kawin" id="input6" disabled>
                        </div>
                        <div class="form-group">
                            <label for="input7">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control pekerjaan" id="input7" disabled>
                        </div>
                        <div class="form-group">
                            <label for="input8">Kewarganegaraan</label>
                            <input type="text" name="kewarganegaraan" class="form-control kewarganegaraan" id="input8" disabled>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="input13">Foto</label>
                            <div class="foto"></div>
                        </div>
                        <div class="form-group">
                            <label for="input13">No Tamu</label>
                            <input type="text" name="no_tamu" class="form-control no_tamu" id="input13">
                        </div>
                        <div class="form-group">
                            <label for="input9">Tujuan</label>
                            <input type="text" name="tujuan" class="form-control tujuan" id="input9">
                        </div>
                        <div class="form-group">
                            <label for="input10">Keperluan</label>
                            <input type="text" name="keperluan" class="form-control keperluan" id="input10">
                        </div>
                        <div class="form-group">
                            <label for="input3">Email</label>
                            <input type="text" name="email" class="form-control email" id="input11">
                        </div>
                        <div class="form-group">
                            <label for="input12">No hp</label>
                            <input type="text" name="no_hp" class="form-control no_hp" id="input12">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="tamu_id" class="id_edit">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-edit">Edit</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var table;
        $(document).ready(function() {
            // CALL FUNCTION SHOW tamu
            show_ktp();

            // Enable pusher logging - don't include this in tamuion
            Pusher.logToConsole = true;

            var pusher = new Pusher('e0e1a2b25c2d08a9221b', {
                cluster: 'ap1',
                forceTLS: true
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                if (data.message === 'success') {
                    show_ktp();
                }
            });

            // FUNCTION SHOW tamu
            function show_ktp() {
                // $.ajax({
                //     url: '<?php echo site_url("Welcome/get_tamu"); ?>',
                //     type: 'GET',
                //     async: true,
                //     dataType: 'json',
                //     success: function(data) {
                //         var html = '';
                //         var count = 1;
                //         var i;
                //         for (i = 0; i < data.length; i++) {
                //             html += '<tr>' +
                //                 '<td>' + count++ + '</td>' +
                //                 '<td>' + data[i].nik + '</td>' +
                //                 '<td>' + data[i].nama + '</td>' +
                //                 '<td>' +
                //                 '<a href="javascript:void(0);" class="btn btn-sm btn-info item_edit" data-id="' + data[i].id_tamu + '" data-name="' + data[i].nik + '" data-price="' + data[i].nama + '">Sunting Tamu</a>' +
                //                 '</td>' +
                //                 '</tr>';
                //         }
                //         $('.show_ktp').html(html);
                //     }

                // });


                $('#mytable').dataTable().fnDestroy();
                table = $('#mytable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        "url": "<?php echo site_url('Welcome/get_tamu') ?>",
                        type: 'POST',
                        "async": true,
                        "dataType": 'json',
                    },
                    'columns': [{
                            "data": 'NO'
                        },
                        {
                            "data": 'NIK'
                        },
                        {
                            "data": 'NAMA'
                        },
                        {
                            "data": 'FOTO'
                        },
                        {
                            "data": 'WAKTU_DATANG'
                        },
                        {
                            "data": 'WAKTU_PULANG'
                        },
                        {
                            "data": ''
                        },
                    ],
                    "columnDefs": [{
                        "targets": [0],
                        "orderable": false,
                    }, {
                        "targets": [3],
                        "orderable": false,
                    }, {
                        "className": "text-center",
                        "targets": [6],
                        'render': function(data, type, full, meta) {
                            if (full.STATUS == null) {
                                return '<a href="javascript:void(0);" class="btn btn-sm btn-info item_edit" data-id="' + full.ID_TAMU + '" data-foto="' + full.FOTO_MODAL + '" data-ttl="' + full.TTL + '" data-nik="' + full.NIK + '" data-nama="' + full.NAMA + '" data-alamat="' + full.ALAMAT + '" data-agama="' + full.AGAMA + '" data-status_kawin="' + full.STATUS_KAWIN + '" data-pekerjaan="' + full.PEKERJAAN + '" data-kewarganegaraan="' + full.KEWARGANEGARAAN + '">Sunting Tamu</a>';
                            }

                            if (full.STATUS == 'IN') {
                                return '<button class="btn btn-sm btn-danger" onClick="update_keluar(' + full.ID_TAMU + ')">Tamu Pulang</button>';
                            }

                            if (full.STATUS == 'OUT') {
                                return 'Sudah Keluar';
                            }
                        },
                    }],

                });
            }

            // UPDATE tamu
            $('#mytable').on('click', '.item_edit', function() {
                var tamu_id = $(this).data('id');
                var tamu_nik = $(this).data('nik');
                var tamu_nama = $(this).data('nama');
                var tamu_ttl = $(this).data('ttl');
                var tamu_alamat = $(this).data('alamat');
                var tamu_agama = $(this).data('agama');
                var tamu_status = $(this).data('status_kawin');
                var tamu_pekerjaan = $(this).data('pekerjaan');
                var tamu_kewarganegaraan = $(this).data('kewarganegaraan');
                var tamu_foto = $(this).data('foto');

                $('#ModalEdit').modal('show');
                $('.id_edit').val(tamu_id);
                $('.nik').val(tamu_nik);
                $('.nama').val(tamu_nama);
                $('.ttl').val(tamu_ttl);
                $('.alamat').val(tamu_alamat);
                $('.agama').val(tamu_agama);
                $('.status_kawin').val(tamu_status);
                $('.pekerjaan').val(tamu_pekerjaan);
                $('.kewarganegaraan').val(tamu_kewarganegaraan);
                $('.foto').html('<img id="foto_ktp" class="rounded" src="' + tamu_foto + '" />');
            });

            $('.btn-edit').on('click', function() {
                var tamu_id = $('.id_edit').val();
                var no_tamu = $('.no_tamu').val();
                var tujuan = $('.tujuan').val();
                var keperluan = $('.keperluan').val();
                var no_hp = $('.no_hp').val();
                var email = $('.email').val();

                $.ajax({
                    url: '<?php echo site_url("Welcome/update_tamu"); ?>',
                    method: 'POST',
                    data: {
                        tamu_id: tamu_id,
                        no_tamu: no_tamu,
                        tujuan: tujuan,
                        no_hp: no_hp,
                        email: email,
                        keperluan: keperluan
                    },
                    success: function() {
                        $('#ModalEdit').modal('hide');
                        $('.id_edit').val("");
                        $('.no_tamu').val("");
                        $('.tujuan').val("");
                        $('.keperluan').val("");
                        $('.no_hp').val("");
                        $('.email').val("");
                        table.ajax.reload();
                    }
                });
            });
            // END EDIT tamu
        });

        function update_keluar(id_tamu) {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url("Welcome/keluar_tamu"); ?>",
                data: {
                    id_tamu: id_tamu
                },
                success: function(result) {
                    alert('Tamu telah pulang');
                }
            })
        }
    </script>