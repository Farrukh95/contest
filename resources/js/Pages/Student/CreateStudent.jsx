import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.jsx";
import {Head, Link, useForm, usePage} from "@inertiajs/react";
import InputError from "@/Components/InputError.jsx";

export default function CreateContest({auth, groups, quote_types}) {

    const {flash} = usePage().props;
    const {data, setData, post, processing, errors, reset} = useForm({
        last_name: '',
        first_name: '',
        middle_name: '',
        email: '',
        group_id: '',
        quote_type_id: '',
        entrance_exam_results: '',
        average_exam_score: '',
        average_subject_score: '',
        entrance_test_results: '',
        is_disabled: 0,
        additional_score: '',
    });
    const submit = (e) => {
        e.preventDefault();

        post(route('students.store'), {
            onSuccess: () => {
                reset(); // Сбросить значения формы после успешного сохранения
            },
        });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<div className="font-semibold ">
                <Link className="text-primary"
                      href={route('students.index')}>Студенты</Link> /
                Добавление студентов</div>}
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

                        <div className="row mt-3">
                            <div className="col-sm-4">
                                <label htmlFor="ContestName"
                                       className="form-label">Фамилия</label>
                                <input type="text"
                                       className="form-control rounded"
                                       id="ContestName"
                                       value={data.last_name}
                                       onChange={(e) => setData('last_name', e.target.value)}
                                />
                                <InputError message={errors.last_name} className="mt-2"/>
                            </div>

                            <div className="col-sm-4">
                                <label htmlFor="ContestName"
                                       className="form-label">Имя</label>
                                <input type="text"
                                       className="form-control rounded"
                                       id="ContestName"
                                       value={data.first_name}
                                       onChange={(e) => setData('first_name', e.target.value)}
                                />
                                <InputError message={errors.first_name} className="mt-2"/>
                            </div>
                            <div className="col-sm-4">
                                <label htmlFor="ContestName"
                                       className="form-label">Отчество</label>
                                <input type="text"
                                       className="form-control rounded"
                                       id="ContestName"
                                       value={data.middle_name}
                                       onChange={(e) => setData('middle_name', e.target.value)}
                                />
                                <InputError message={errors.middle_name} className="mt-2"/>
                            </div>
                        </div>
                        <div className="row mt-3">
                            <div className="col-sm-4">
                                <label htmlFor="StudentEmail"
                                       className="form-label">Email</label>
                                <input type="email"
                                       className="form-control rounded"
                                       id="StudentEmail"
                                       value={data.email}
                                       onChange={(e) => setData('email', e.target.value)}
                                />
                                <InputError message={errors.email} className="mt-2"/>
                            </div>

                            <div className="col-sm-4">
                                <label htmlFor="StudentGroup"
                                       className="form-label">Группа</label>
                                <select className="form-select rounded"
                                        id="StudentGroup"
                                        value={data.group_id}
                                        onChange={(e) => setData('group_id', e.target.value)}
                                >
                                    <option value="">Выберите группу</option>
                                    {groups.map((group, index) => (
                                        <option key={index} value={group.id}>{group.name}</option>
                                    ))}
                                </select>
                                <InputError message={errors.group_id} className="mt-2"/>
                            </div>
                            <div className="col-sm-4">
                                <label htmlFor="StudentQuoteType"
                                       className="form-label">Тип квоты</label>
                                <select className="form-select rounded"
                                        id="StudentQuoteType"
                                        value={data.quote_type_id}
                                        onChange={(e) => setData('quote_type_id', e.target.value)}
                                >
                                    <option value="">Выберите</option>
                                    {quote_types.map((quote, index) => (
                                        <option key={index} value={quote.id}>{quote.name}</option>
                                    ))}
                                </select>
                                <InputError message={errors.quote_type_id} className="mt-2"/>
                            </div>
                        </div>
                        <div className="row mt-3">
                            <div className="col-sm-4">
                                <label htmlFor="StudentAverrageExamScore"
                                       className="form-label">Средний балл по семестрам</label>
                                <input type="text"
                                       className="form-control rounded"
                                       id="StudentAverrageExamScore"
                                       value={data.average_exam_score}
                                       onChange={(e) => setData('average_exam_score', e.target.value)}
                                />
                                <InputError message={errors.average_exam_score} className="mt-2"/>
                            </div>

                            <div className="col-sm-4">
                                <label htmlFor="AverrageSubjectScore"
                                       className="form-label">Средний балл по предметам</label>
                                <input type="text"
                                       className="form-control rounded"
                                        id="AverrageSubjectScore"
                                        value={data.average_subject_score}
                                        onChange={(e) => setData('average_subject_score', e.target.value)}
                               />
                                <InputError message={errors.average_subject_score} className="mt-2"/>
                            </div>
                            <div className="col-sm-4">
                                <label htmlFor="EntranceTestResults"
                                       className="form-label">Рез. вход. тест-ния</label>
                                <input type="number"
                                    className="form-control rounded"
                                       id="EntranceTestResults"
                                       value={data.entrance_exam_results}
                                       onChange={(e) => setData('entrance_exam_results', e.target.value)}
                                />
                                <InputError message={errors.entrance_exam_results} className="mt-2"/>
                            </div>
                        </div>
                        <div className="row mt-3">
                            <div className="col-sm-4">
                                <label htmlFor="EntranceTestResults"
                                       className="form-label">Результаты ВИ</label>
                                <input type="number"
                                       className="form-control rounded"
                                       id="EntranceTestResults"
                                       value={data.entrance_test_results}
                                       onChange={(e) => setData('entrance_test_results', e.target.value)}
                                />
                                <InputError message={errors.entrance_test_results} className="mt-2"/>
                            </div>
                            <div className="col-sm-4">
                                <label htmlFor="StudentIsDisabled" className="form-label">Инвалид</label>
                                <select className="form-select rounded"
                                        id="StudentGroup"
                                        value={data.is_disabled}
                                        onChange={(e) => setData('is_disabled', e.target.value)}
                                >
                                    <option value="0">Нет</option>
                                    <option value="1">Да</option>

                                </select>
                                <InputError message={errors.is_disabled} className="mt-2"/>
                            </div>
                            {parseInt(data.is_disabled) === 1 &&
                                <div className="col-sm-4">
                                    <label htmlFor="StudentAdditionalScore" className="form-label">Доп баллы за
                                        инвалидности</label>
                                    <input type="number"
                                           className="form-control rounded"
                                           id="StudentAdditionalScore"
                                           value={data.additional_score}
                                           onChange={(e) => setData('additional_score', e.target.value)}
                                    />
                                    <InputError message={errors.additional_score} className="mt-2"/>
                                </div>
                            }

                        </div>
                        <button className="btn btn-primary text-white mt-4" disabled={processing}>Добавить</button>
                    </form>
                </div>
            </div>


        </AuthenticatedLayout>
    );
}
