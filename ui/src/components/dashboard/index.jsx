import axios from "axios";
import { useEffect, useState } from "react";
import config from "../../config";
import InfoCard from "./partials/InfoCard";
import { Stats } from "./partials/Stats";

export default function Dashboard() {
  const [data, setData] = useState(0);
  const [years, setYears] = useState([]);

  const getData = (year = null) => {
    axios
      .get(config.api_uri + "stats", {
        params: {
          year: year,
        },
      })
      .then((response) => setData(response.data));
  };

  useEffect(function () {
    // Get stats.
    getData();

    // Get years of study.
    axios
      .get(config.api_uri + "study-years")
      .then((response) => setYears(response.data.years));
  }, []);

  // if (!data || years.length == 0) return;

  return (
    <>
      <div className="flex flex-row justify-between">
        <h3 className="text-blue-700 font-semibold uppercase">
          Tableau de borde d'état d'avancement
        </h3>
        <div>
          <select
            placeholder="Année"
            className="p-2 rounded-md"
            onChange={(e) => getData(e.target.value)}
          >
            {years.map((year) => (
              <option value={year}> {year} </option>
            ))}
          </select>
        </div>
      </div>

      <InfoCard
        title={data.title}
        students={data.students}
        year={data.year_of_study}
      />
      {data.stats && (
        <Stats
          group={data.stats.group}
          projects={data.stats.projects}
          students={data.stats.students}
        />
      )}
    </>
  );
}
