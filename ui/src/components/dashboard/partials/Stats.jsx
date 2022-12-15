function StatBar(props) {
    return (
        <div className="w-full inline-flex items-center space-x-2">
            { props.title && <span className="whitespace-nowrap w-36 overflow-hidden"> {props.title} </span> }
            <div className="w-full bg-gray-200 rounded-full border">
                <div
                    className="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-l-full"
                    style={{ width: props.stat + "%" }}
                >
                    {props.stat + '%'}
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

function Stats() {
    const users = [
        {
            name: "John Doe",
            stat: 50
        },
        {
            name: "Alex Polm",
            stat: 20
        }
    ]

    const projects = [
        {
            name: "Brief 1",
            stat: 75,
        },
        {
            name: "Brief 2",
            stat: 46,
        },
        {
            name: "Brief 3",
            stat: 20,
        }
    ]

    return (
        <div className="flex flex-row justify-center space-x-10 mt-16">
            <div className="flex flex-col w-full space-y-6">
                <StatCard label="état d'avancement du groupe">
                    <StatBar stat={50} />
                </StatCard>
                <StatCard label="état d'avancement des briefs">
                {projects.map(user => <StatBar title={user.name} stat={user.stat} />)}
                </StatCard>
            </div>
            <StatCard label="état d'avancement des apprenants">
                {users.map(user => <StatBar title={user.name} stat={user.stat} />)}
            </StatCard>
        </div>
    )
}

export { Stats };