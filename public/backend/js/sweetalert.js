$(function() {
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success ml-1',
                cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Əminsən ?',
            text: "Sildikən sonra geri qaytarılamaz",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Bəli, Sil!',
            cancelButtonText: 'Xeyr, Silmə!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                swalWithBootstrapButtons.fire(
                    'Silindi!',
                    'Uğurla Silindi',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Ləğv Edildi!',
                    'Məlumatlar Güvəndədir! ;)',
                    'error'
                )
            }
        })
    })
})

$(function() {
    $(document).on('click', '#confirm', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success ml-1',
                cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Sifariş təsdiq edilsin ?',
            text: "Təsdiq edildikdən sonra dəyişə bilməzsən !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Bəli, Təsdiq Et!',
            cancelButtonText: 'Xeyr, Təsdiq ETMƏ!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                swalWithBootstrapButtons.fire(
                    'Sifariş Təsdiq Edildi!',
                    'Uğurla Təsdiq Edildi',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Ləğv Edildi!',
                    'Məlumat Dəyişdirilmədi!',
                    'error'
                )
            }
        })
    })
})

$(function() {
    $(document).on('click', '#processing', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success ml-1',
                cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Sifariş Hazırlansın ?',
            text: "Təsdiq edildikdən sonra dəyişə bilməzsən !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Bəli, Təsdiq Et!',
            cancelButtonText: 'Xeyr, Təsdiq ETMƏ!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                swalWithBootstrapButtons.fire(
                    'Sifariş Hazırlanır!',
                    'Uğurla Təsdiq Edildi',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Ləğv Edildi!',
                    'Məlumat Dəyişdirilmədi!',
                    'error'
                )
            }
        })
    })
})

$(function() {
    $(document).on('click', '#picked', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success ml-1',
                cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Sifariş Hazırlandı deyə təsdiq edilsin ?',
            text: "Təsdiq edildikdən sonra dəyişə bilməzsən !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Bəli, Təsdiq Et!',
            cancelButtonText: 'Xeyr, Təsdiq ETMƏ!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                swalWithBootstrapButtons.fire(
                    'Sifariş Hazırlandı!',
                    'Uğurla Təsdiq Edildi',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Ləğv Edildi!',
                    'Məlumat Dəyişdirilmədi!',
                    'error'
                )
            }
        })
    })
})

$(function() {
    $(document).on('click', '#shipped', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success ml-1',
                cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Sifariş Kargoya Verilsin ?',
            text: "Təsdiq edildikdən sonra dəyişə bilməzsən !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Bəli, Təsdiq Et!',
            cancelButtonText: 'Xeyr, Təsdiq ETMƏ!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                swalWithBootstrapButtons.fire(
                    'Sifariş Kargoya Verildi!',
                    'Uğurla Təsdiq Edildi',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Ləğv Edildi!',
                    'Məlumat Dəyişdirilmədi!',
                    'error'
                )
            }
        })
    })
})

$(function() {
    $(document).on('click', '#delivered', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success ml-1',
                cancelButton: 'btn btn-danger mr-1'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Sifariş Təhvil Verildi ?',
            text: "Təsdiq edildikdən sonra dəyişə bilməzsən !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Bəli, Təsdiq Et!',
            cancelButtonText: 'Xeyr, Təsdiq ETMƏ!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                swalWithBootstrapButtons.fire(
                    'Sifariş Təhvil Verildi!',
                    'Uğurla Təsdiq Edildi',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Ləğv Edildi!',
                    'Məlumat Dəyişdirilmədi!',
                    'error'
                )
            }
        })
    })
})