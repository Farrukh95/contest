import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.jsx";
import {Head, useForm, usePage} from "@inertiajs/react";
import InputError from "@/Components/InputError.jsx";

export default function CreateContest({auth}) {

    const {flash} = usePage().props;
    const {data, setData, post, processing, errors, reset} = useForm({
        name: '',
        date_start: '',
        date_end: '',
    });
    const submit = (e) => {
        e.preventDefault();

        post(route('contests.store'), {
            onSuccess: () => {
                reset(); // Сбросить значения формы после успешного сохранения
            },
        });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Конкурсы</h2>}
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
                        <h2 className={'my-3'}>Создание конкурсов</h2>
                        <div className="mb-3">
                            <label htmlFor="ContestName" className="form-label">Название</label>
                            <input type="text"
                                   className="form-control"
                                   id="ContestName"
                                   value={data.name}
                                   onChange={(e) => setData('name', e.target.value)}
                            />
                            <InputError message={errors.name} className="mt-2"/>
                        </div>
                        <div className="mb-3">
                            <label htmlFor="DateStartContest" className="form-label">Дата начало</label>
                            <input type="date"
                                   className="form-control"
                                   id="DateStartContest"
                                   value={data.date_start}
                                   onChange={(e) => setData('date_start', e.target.value)}
                            />
                            <InputError message={errors.date_start} className="mt-2"/>
                        </div>
                        <div className="mb-3">
                            <label className="form-check-label" htmlFor="DateEndContest">Дата окончания</label>
                            <input type="date"
                                   className="form-control"
                                   id="DateEndContest"
                                   value={data.date_end}
                                   onChange={(e) => setData('date_end', e.target.value)}
                            />
                            <InputError message={errors.date_end} className="mt-2"/>
                        </div>
                        <button className="btn btn-primary text-white" disabled={processing}>Добавить</button>
                    </form>
                </div>
            </div>


        </AuthenticatedLayout>
    );
}
