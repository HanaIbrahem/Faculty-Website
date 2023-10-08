
$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");


        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })


    });

});


$(function () {
    $(document).on('click', '#pin', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        var isPinned = $(this).data("is-pinned");

        var confirmText = isPinned === 'yes' ? "Unpin this data?" : "Pin this data on top?";
        var successMessage = isPinned === 'yes' ? "Your file has been unpinned." : "Your file has been pinned.";

        Swal.fire({
            title: 'Are you sure?',
            text: confirmText,
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire(
                    'Pinned!',
                    successMessage,
                    'success'
                )
            }
        });
    });
});


