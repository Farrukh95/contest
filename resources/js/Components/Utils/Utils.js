import {router} from "@inertiajs/react";
import Swal from "sweetalert2";

export const create = (e, post, url, processing, reset) => {
    e.preventDefault();
    post(url, {
        preserveScroll: true,
        onSuccess: (response) => {
            success(response, processing, Swal)
            reset()

        }
    });
}
export const createReplace = (e, post, url, processing, Swal, reset) => {
    e.preventDefault();
    post(url, {
        preserveScroll: true,
        onSuccess: (response) => {
            success(response, processing, Swal)
            window.location.replace(localStorage.getItem('url'))
            reset()

        }
    });
}

export const update = (e, data, url, processing, Swal) => {
    e.preventDefault();
    router.post(url, data, {
        onSuccess: (response) => {
            success(response, processing, Swal)
        }
    });
}


export const inertiaDelete = (url) => {
    Swal.fire({
        title: 'Вы действительно хотите удалить?',
        showCancelButton: true,
        cancelButtonText: 'Отмена',
        confirmButtonText: 'Да',

    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(url, {
                preserveScroll: true,
                onSuccess: (response) => {
                    success(response, '', Swal)

                }
            })
        }
    })

}


function success(response, processing=null, Swal) {
    processing
    Swal.fire({
        icon: 'success',
        title: response.props.flash.message,
        showConfirmButton: true,
        timer: 1500
    });
}


