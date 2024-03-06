import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.jsx";
import {Head, Link} from "@inertiajs/react";
import {Pencil, Plus, Trash} from "react-bootstrap-icons";
import {inertiaDelete} from "@/Components/Utils/Utils.js";

export default function IndexApplication({auth, applications}) {
    console.log(applications)

    const deleteContest = (id) => {
        const url = route('applications.destroy', id)
        inertiaDelete(url)
    };
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Заявки</h2>}
        >
            <Head title="Конкурсы"/>
            <div className={'container'}>
                <div className="text-center mt-4">
                    <Link className={'btn btn-success text-white inline-flex'}
                          href={route('contests.create')}>
                        <Plus size={25}/> Создать конкурс
                    </Link>
                </div>
                <div className="bg-white overflow-hidden shadow-lg sm:rounded-lg mt-4">

                    <table className={'table'}>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Конкурс</th>
                            <th scope="col">Модуль 1</th>
                            <th scope="col">Модуль 2</th>
                            <th scope="col" className={'text-center'}>Редактирование</th>
                            <th scope="col" className={'text-center'}>Удаление</th>
                        </tr>
                        </thead>
                        <tbody>
                        {applications.data.map((application, index) => (
                            <tr key={index}>
                                <th scope="row">{index + 1}</th>
                                <td>{application.student_fio}</td>
                                <td>{application.contest_name}</td>
                                <td>{application.module_priority_name_1}</td>
                                <td>{application.module_priority_name_2}</td>
                                <td className={'text-center'}>
                                    <button>
                                        <Pencil className={'text-warning mr-3'}/>
                                    </button>

                                </td>
                                <td className={'text-center'}>
                                    <button onClick={() => deleteContest(contest.id)}>
                                        <Trash className={'text-danger'}/>
                                    </button>
                                </td>
                            </tr>
                        ))}


                        </tbody>
                    </table>

                </div>


            </div>


        </AuthenticatedLayout>
    );
}
