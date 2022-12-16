import axios from "axios";
import { useEffect, useState } from "react";
import config from "../../config";
import InfoCard from "./partials/InfoCard";
import { Stats } from "./partials/Stats";

export default function Dashboard() {
  const [data, setData] = useState(0);

  useEffect(function () {
    axios.get(config.api_uri + "stats").then((response) => {
      setData(response.data);
    });
  }, []);

  if (!data) return;

  return (
    <>
      <div className="flex flex-row justify-between">
        <h3 className="text-blue-700 font-semibold uppercase">
          Tableau de borde d'état d'avancement
        </h3>
        <div>
          <input name="year_of_study" placeholder="Année" />
        </div>
      </div>

      <InfoCard />
      <Stats
        group={data.stats.group}
        projects={data.stats.projects}
        students={data.stats.students}
      />
    </>
  );
}
