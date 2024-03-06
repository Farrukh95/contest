import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.jsx";
import {Head, Link} from "@inertiajs/react";
import {CheckCircle, Plus} from "react-bootstrap-icons";

export default function IndexStudent({auth, students}) {

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Студенты</h2>}
        >
            <Head title="Студенты"/>
            <div className={'container'}>
                <div className="text-center mt-4">
                    <Link className={'btn btn-success text-white inline-flex'}
                          href={route('students.create')}>
                        <Plus size={25}/>Добавить студента
                    </Link>
                </div>

                <div className="bg-white overflow-hidden shadow-lg sm:rounded-lg mt-4">

                    <table className={'table'}>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Группа</th>
                            <th scope="col">Тип квоты</th>
                            <th scope="col">ВИ</th>
                            <th scope="col">Ср. балл за 1 и 2 сем.</th>
                            <th scope="col">Ср. балл по баз. пред.</th>
                            <th scope="col">Рез. вход. тест-ния</th>
                            <th scope="col">Инвалид</th>
                            <th scope="col">Доп баллы</th>
                            <th scope="col">Рейтинг</th>
                            <th scope="col" className={'text-center'}>Подать заявку</th>
                        </tr>
                        </thead>
                        <tbody>
                        {students.data.map((student, index) => (
                            <tr key={index}>
                                <th scope="row">{index + 1}</th>
                                <td>
                                    <Link className="text-primary"
                                          href={route('students.show', student.id)}>
                                        {student.last_name} {student.first_name} {student.middle_name}
                                    </Link>
                                </td>
                                <td>{student.group_name}</td>
                                <td>{student.quote_type_name}</td>
                                <td>{student.entrance_exam_results}</td>
                                <td>{student.average_exam_score}</td>
                                <td>{student.average_subject_score}</td>
                                <td>{student.entrance_test_results}</td>
                                <td>{student.is_disabled === 1 ? 'Да' : 'Нет'}</td>
                                <td>{student.additional_score}</td>
                                <td>{student.rating}</td>
                                <td className={'text-center'}>
                                    {student.application ?
                                        <CheckCircle className={'text-success'}/>
                                        :
                                        <Link href={route('create.student.application', student.id)}
                                              className="btn btn-success">Подать заявку</Link>
                                    }

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
