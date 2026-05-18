const svg = document.querySelector(".fila");
const info = document.querySelector(".info");

function obtenerInfo(id) {
  switch (id) {
    case "e72":
      return "SPECTRA T380 18478A1";
    case "e71":
      return "DELL EMC ISILON F800 JWXNT184200103--JWXNT184200054--JWXNT183900121--JWXNT184500424--FC6IS190400001";
    case "e70":
      return "DELL EMC ISILON F800 JWXNT184200097--JWXNT184200086";
    case "e69":
      return "EMC ISILON A100 FC615190400001";
    case "e68":
      return "SPECTRA BLACK PER 5003048018133AFF";
    case "e67":
      return "DELL EMC R640 G7MD9T2";
    case "e66":
      return "DELL EMC R640 G7N79T2";
    case "e65":
      return "DELL EMC R640 DP7L9T2";
    case "e64":
      return "DELL EMC R640 DP7K9T2";
    case "e63":
      return "DELL EMC R640 DP8G9T2";
    case "e62":
      return "DELL EMC R640 DP7M9T2";
    case "e61":
      return "DELL EMC R640 G7PD9T2";
    case "e60":
      return "DELL EMC R640 DP7J9T2";
    case "e59":
      return "DELL EMC R440 16XM9T2";
    case "e58":
      return "MODULO APC N/A N/A";
    case "e57":
      return "DELL EMC R440 16ZJ9T2";
    case "e56":
      return "DELL EMC R440 16YL9T2";
    case "e55":
      return "DELL EMC R440 16YM9T2";
    case "e54":
      return "DELL C9010 8D4SG02";
    case "e53":
      return "DELL EMC R650 4NP08V3";
    case "e52":
      return "DELL EMC R650 5NP08V3";
    case "e51":
      return "DELL EMC R650 3NP08V3";
    case "e50":
      return "EATON-ATS N/A GA07J47012";
    case "e49":
      return "DELL MDS-9184 36CRXC2";
    case "e48":
      return "DELL EMC S6100-ON 16YK9T2";
    case "e47":
      return "DELL M3048 36CRXC2";
    case "e46":
      return "IBM 2498-F96 10368RG";
    case "e45":
      return "HUAWEI NET ENGINE AR6121E 7ASA19C9455C27X/ NET ENGINE AR6121E";
    case "e44":
      return "DELL C9010 8D1TG02";
    case "e43":
      return "PURE STORAGE FLASH ARRAY PCTFJ2224016C--PCTFJ22240184";
    case "e42":
      return "EATON ATS220 GA07J46011";
    case "e41":
      return "PURE STORAGE DIRECT FLASH PSMF-J230300SF--PSMFJ23050051";
    case "e40":
      return "CISCO MDS-9148 JPG22470";
    case "e39":
      return "DELL NWS6 100-ON 16YK9T2";
    case "e38":
      return "DELL EMC N30048EP-ON G7BRXC2";
    case "e37":
      return "IBM 2498-F96 10368PK";
    case "e36":
      return "PURE STORAGE FLASH ARRAY PCPFJ223500B7--PCPFJ223801A1";
    case "e35":
      return "DELL EMC UNITY 400EMC-L CF2CV184600574--APM00190246264--APM00190406486";
     case "e34":
      return "DELL EMC UNITY 400EMC-L CF2CZ1838541--CF2CY183800538--CF2CY181800015";
    case "e33":
      return "DELL EMC UNITY 400EMC-L CF2CZ1838683--CF2CY1838738--CF2CY184200247";
    case "e32":
      return "DELL EMC UNITY 400EMC-L CF2CZ184200268--CFCY184200247--CF2CY183800738 ";
    case "e31":
      return "DELL EMC UNITY 400EMC-L CF2CZ182700458--CFCY181800015--CF2CY183800538";
    case "e30":
      return "DELL EMC R440 170K9T2";
    case "e29":
      return "DELL EMC R440 170K9T2";
    case "e28":
      return "DELL EMC R440 16YK9T2";
    case "27":
      return "DELL EMC R640 H21C9T2";
    case "e26":
      return "DELL EMC R440 1Z1RCS2";
    case "e25":
      return "DELL EMC R640 170M9T2";
    case "e24":
      return "DELL EMC R640 G7JD9T2";
    case "e23":
      return "DELL EMC R640 G7RD9T2";
    case "e22":
      return "APC N/A N/A";
    case "e21":
      return "EATON PULSARSTS16 N/A";
    case "e20":
      return "DELL EMC R750 6B3K7V3";
    case "e19":
      return "DELL EMC R750 5B3K7V3";
    case "e18":
      return "SUN ORACLE DATABASE APPLIANCE X7-2S 1505XD30PV";
    case "e17":
      return "SUN ORACLE DATABASE APPLIANCE X7-2S 1905XD30PW";
    case "e16":
      return "ISILON A200 DELL ISILON JWXNM183600091--JWXNM182300051--JWXNM171800050--JWXNM182900037";
    case "e15":
      return "ISILON A200 DELL ISILON JWXNM182300159--JWXNM182900255";
    case "e14":
      return "SPECTRA BLACK PEARL 500304818158CFF";
    case "e13":
      return "DELL EMC R440 16ZM9T2";
    case "e12":
      return "DELL EMC R440 16ZL9T2";
    case "e11":
      return "DELL EMC R440 16ZK9T2";
    case "e10":
      return "DELL EMC R440 170L9T2";
    case "e9":
      return "DELL EMC R441 H21D9T2";
    case "e8":
      return "DELL EMC R440 16YJ9T2";
    case "e7":
      return "APC N/A N/A";
    case "e6":
      return "KVM N/A N/A";
    case "e5":
      return "DELL S4112F NVKTNK2";
    case "e4":
      return "DELL S3124 CZSQNK2";
    case "e3":
      return "DELL N3024ET-ON 30KTNK2";
    case "e2":
      return "B-DR 8 VE IT BDI-9045 JSZ213704418";
    case "e1-1":
      return "CISCO MDS-9148S-16G TTM2239034N";
    case "e1":
      return "CISCO MDS-9148S-16G N/A";
    default:
      return "Equipo sin informacion";
 }
}
 document.addEventListener("click", (e) => {

    const el = e.target.closest(".rack-item");
    if (!el) {
      info.style.display = "none"; 
      return;
    }

    info.textContent = obtenerInfo(el.id);
    info.style.display = "block";

    const rect = info.getBoundingClientRect();
    const padding = 10;

    let left = e.pageX - rect.width / 2;
    let top = e.pageY - rect.height - 10;

    if (left < window.scrollX + padding) {
      left = window.scrollX + padding;
    }

    if (left + rect.width > window.scrollX + window.innerWidth - padding) {
      left = window.scrollX + window.innerWidth - rect.width - padding;
    }

    if (top < window.scrollY + padding) {
      top = e.pageY + 15;
    }

    info.style.left = `${left}px`;
    info.style.top = `${top}px`;

  });
