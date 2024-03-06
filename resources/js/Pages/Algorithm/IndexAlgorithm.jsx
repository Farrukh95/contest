import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.jsx";
import {Head, Link} from "@inertiajs/react";
import {inertiaDelete} from "@/Components/Utils/Utils.js";

export default function IndexAlgorithm({auth}) {

    const deleteContest = (id) => {
        const url = route('applications.destroy', id)
        inertiaDelete(url)
    };
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Алгоритмы распределения
                студентов</h2>}
        >
            <Head title="Конкурсы"/>
            <div className={'container'}>
                <div className="row mt-6 text-center">
                    <div className="col-sm-6">
                        <Link className="btn btn-primary"
                              href={route('algorithm1', {type: 'txt'})}>
                            Распределение студентов по дате подачи заявки
                        </Link>
                    </div>
                    <div className="col-sm-6">
                        <button className="btn btn-primary">
                            Распределение студентов по критериям
                        </button>
                    </div>
                </div>

            </div>


        </AuthenticatedLayout>
    );
}
