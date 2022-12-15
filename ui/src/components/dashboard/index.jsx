import InfoCard from "./partials/InfoCard";
import { Stats } from "./partials/Stats";

export default function Dashboard() {
    return (
        <>
            <h3 className="text-blue-700 font-semibold uppercase">
                Tableau de borde d'état d'avancement
            </h3>
            <InfoCard />
            <Stats />
        </>
    )
}