function StatBar(props) {
    return (
        <div className="w-full inline-flex items-center space-x-2">
            { props.title && <span className="whitespace-nowrap w-36 overflow-hidden"> {props.title} </span> }
            <div className="w-full bg-gray-200 rounded-full border">
                <div
                    className="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                    style={{ width: (props.progress == 0 ? 15 : props.progress) + "%" }}
                >
                    {props.progress + '%'}
                </div>
            </div>
        </div>

    )
}

function StatCard(props) {
    return (
        <div className="w-full space-y-3">
            <h4 className="text-blue-700 font-semibold uppercase">
                {props.label}
            </h4>
            <div className="border border-blue-600 rounded-md py-10 px-6 space-y-1">
                {props.children}
            </div>
        </div>
    )
}

function Stats(props) {
    return (
        <div className="flex flex-row justify-center space-x-10 mt-16">
            <div className="flex flex-col w-full space-y-6">
                <StatCard label="état d'avancement du groupe">
                    <StatBar progress={props.group} />
                </StatCard>
                <StatCard label="état d'avancement des briefs">
                {props.projects.map(project => <StatBar title={project.title} progress={project.progress} />)}
                </StatCard>
            </div>
            <StatCard label="état d'avancement des apprenants">
                {props.students.map(student => <StatBar title={student.name} progress={student.progress} />)}
            </StatCard>
        </div>
    )
}

export { Stats };