import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.jsx";
import {Head, Link, useForm, usePage} from "@inertiajs/react";
import InputError from "@/Components/InputError.jsx";
import {ChevronLeft} from "react-bootstrap-icons";
import {create} from "@/Components/Utils/Utils.js";

export default function CreateApplication({auth, modules, contests, student}) {

    const {flash} = usePage().props;
    const {data, setData, post, processing, errors, reset} = useForm({
        contest_id: '',
        module_priority_1: '',
        module_priority_2: '',
    });

    const submit = (e) => {
        e.preventDefault();
        const url = route('store.student.application', student.id)
        create(e, post, url, processing, reset);
    };

    const filteredModules = modules.filter(module => module.id !== parseInt(data.module_priority_1));
    console.log(filteredModules, data)


    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">
                <Link className="btn btn-sm btn-secondary inline-flex" href={route('students.index')}>
                    <ChevronLeft size={20}/> Вернуться
                </Link>

            </h2>}
        >
            <Head title="Конкурсы"/>
            <div className={'container'}>
                {flash.message && (
                    <div className="alert alert-success mt-4 alert-dismissible fade show" role="alert">
                        {flash.message}
                    </div>
                )}

                <div className="bg-white overflow-hidden shadow-lg sm:rounded-lg mt-4">

                    <form className="m-3" onSubmit={submit}>
                        <h2 className={'my-3 font-bold'}>
                            {student.last_name} {student.first_name} {student.middle_name}
                        </h2>
                        <div className="mb-3">
                            <label htmlFor="ContestName" className="form-label">Название</label>
                            <select
                                className="form-select"
                                id="ContestName"
                                value={data.contest_id}
                                onChange={(e) => setData('contest_id', e.target.value)}
                            >
                                <option value="">Выберите Конкурс</option>
                                {contests.map((contest, index) => (
                                    <option key={index} value={contest.id}>{contest.name}</option>
                                ))}

                            </select>
                            <InputError message={errors.contest_id} className="mt-2"/>
                        </div>
                        <div className="mb-3">
                            <label htmlFor="DateStartContest" className="form-label">Приоритет 1</label>
                            <select
                                className="form-select"
                                id="ContestName"
                                value={data.module_priority_1 !== '' ? data.module_priority_1 : ''}
                                onChange={(e) => setData('module_priority_1', e.target.value)}
                            >
                                <option value="">Выберите приоритет 1</option>
                                {modules.map((module, index) => (
                                    <option key={index} value={module.id}>{module.name}</option>
                                ))}

                            </select>
                            <InputError message={errors.module_priority_1} className="mt-2"/>
                        </div>
                        <div className="mb-3">
                            <label className="form-check-label" htmlFor="DateEndContest">Приоритет 2</label>
                            <select
                                className="form-select"
                                id="ContestName"
                                value={data.module_priority_2}
                                onChange={(e) => setData('module_priority_2', e.target.value)}
                            >
                                <option value="">Выберите приоритет 2</option>
                                {filteredModules.map((module, index) => (
                                    <option key={index} value={module.id}>{module.name}</option>
                                ))}

                            </select>
                            <InputError message={errors.module_priority_2} className="mt-2"/>
                        </div>
                        <button className="btn btn-primary text-white" disabled={processing}>Добавить</button>
                    </form>
                </div>
            </div>


        </AuthenticatedLayout>
    );
}
