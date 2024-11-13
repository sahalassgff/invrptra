<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 rounded-lg shadow-lg overflow-hidden">
            <div class="modal-header border-0 position-relative" style="background: linear-gradient(135deg, #4a90e2, #50c9c3);">
                <h5 class="modal-title text-white font-weight-bold" id="exampleModalLabel">Konfirmasi Keluar</h5>
                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close" style="outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="position-absolute" style="bottom: -10px; left: 50%; transform: translateX(-50%); width: 100%; height: 4px; background: #fff;"></div>
            </div>
            <div class="modal-body text-center text-dark py-5" style="font-size: 1rem;">
                <i class="fas fa-exclamation-circle text-warning mb-3" style="font-size: 2.8rem; animation: shake 0.3s ease-in-out;"></i>
                <p class="mb-0" style="font-weight: 500;">Apakah Anda yakin ingin keluar dari aplikasi?</p>
            </div>
            <div class="modal-footer border-0 d-flex justify-content-center">
                <button class="btn btn-sm btn-outline-secondary shadow-sm px-4 mr-2" type="button" data-dismiss="modal" style="border-radius: 20px;">Batal</button>
                <a class="btn btn-sm btn-primary text-white shadow px-4" href="<?=base_url();?>process/logout.php" style="border-radius: 20px; background: linear-gradient(135deg, #4a90e2, #50c9c3);">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    /* Animasi dan CSS khusus */
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        50% { transform: translateX(5px); }
        75% { transform: translateX(-5px); }
    }
    .modal-body p {
        font-size: 1.1rem;
        color: #444;
    }
    .btn-outline-secondary:hover {
        background-color: #e2e6ea;
        color: #444;
    }
    .modal-content {
        animation: fadeIn 0.4s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Ganti Password Modal-->
<div class="modal fade" id="gantiPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?=base_url();?>process/users.php?act=<?=encrypt('ganti_pass');?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-black">Password Baru</label>
                        <input type="hidden" name="id" value="<?=$_SESSION['iduser'];?>">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-success" type="submit" name="ubah_pass"><i class="fas fa-key"></i>
                        Ganti Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url();?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?=base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/vendor/jquery-mask/jquery-mask.min.js"></script>
<script src="<?=base_url();?>assets/vendor/sweet-alert/sweetalert2.all.min.js"></script>
<script src="<?=base_url();?>assets/vendor/select2/js/select2.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?=base_url();?>assets/js/demo/datatables-demo.js"></script>
<script src="<?=base_url();?>assets/js/demo/sweet-alert.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2({
        theme: "classic",
    });
    $('.uang').mask('000.000.000.000.000', {
        reverse: true
    });
})
</script>
</body>

</html>