import InfoCard from "./partials/InfoCard";
import { Stats } from "./partials/Stats";

export default function Dashboard() {
    return (
        <>
        <div className="flex flex-row justify-between">
        <h3 className="text-blue-700 font-semibold uppercase">
                Tableau de borde d'état d'avancement
            </h3>
            <div>
                <input name="year_of_study" placeholder="Année"/>
            </div>
        </div>
            
            <InfoCard />
            <Stats />
        </>
    )
}