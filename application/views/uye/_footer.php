    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url() ?>assets/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?= base_url() ?>assets/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="cdn.datatables.net/plug-ins/1.10.15/i18n/Turkish.json"></script> 
    <script src="<?= base_url() ?>assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>assets/admin/dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true,
                "aLengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "Hepsi"]],
                "iDisplayLength": 10,
                "language": {
                    "sDecimal": ",",
                    "sEmptyTable": "Tabloda herhangi bir veri mevcut değil",
                    "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                    "sInfoEmpty": "Kayıt yok",
                    "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "Sayfada _MENU_ kayıt göster",
                    "sLoadingRecords": "Yükleniyor...",
                    "sProcessing": "İşleniyor...",
                    "sSearch": "Ara:",
                    "sZeroRecords": "Eşleşen kayıt bulunamadı",
                    "oPaginate": {
                        "sFirst": "İlk",
                        "sLast": "Son",
                        "sNext": "Sonraki",
                        "sPrevious": "Önceki"
                    },
                    "oAria": {
                        "sSortAscending": ": artan sütun sıralamasını aktifleştir",
                        "sSortDescending": ": azalan sütun soralamasını aktifleştir"
                    },
                }
            });
        });
    </script><!-- Page-Level Demo Scripts - Tables - Use for reference -->
</body>

</html>
