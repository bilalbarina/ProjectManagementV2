function InfoCard(props) {
    return (
        <div className="bg-gray-100 rounded-md shadow px-6 py-8 flex justify-between w-full mt-2">
            <div>
                { props.title }
            </div>

            <div>
                { props.students }
            </div>

            <div>
                { props.year }
            </div>
        </div>
    )
}

export default InfoCard;