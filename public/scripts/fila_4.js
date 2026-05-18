document.addEventListener("DOMContentLoaded", () => {

  const info = document.querySelector(".info");

  function obtenerInfo(id) {
    switch (id) {
      case "e59":
        return "HP PROLIANT DL380G7 USE103N8L0";
      case "e58":
        return "HP PROLIANT DL380G8 2M24340606";
      case "e57":
        return "HP PROLIANT DL380G9 MXQ5460156";
      case "e56":
        return "HP PROLIANT DL380G9 MXQ5460155";
      case "e55":
        return "HP PROLIANT DL380G7 USE103N8LB";
      case "e54":
        return "HP PROLIANT DL380G7 USE103N8L3";
      case "e53":
        return "HP PROLIANT DL380G8 SGH3290T15";
      case "e52":
        return "HP PROLIANT DL380G8 2M243902BN";
      case "e51":
        return "HP PROLIANT DL380G7 2M224002VX";
      case "e50":
        return "HP PROLIANT DL380G8 SGH3290T13";
      case "e49":
        return "HP PROLIANT DL380G7 USE103NBL5";
      case "e48":
        return "HP PROLIANT DL380G7 N/A";
      case "e47":
        return "HP PROLIANT DL380G8 2M243902B0";
      case "e46":
        return "HP PROLIANT DL380G9 MXQ5460157";
      case "e45":
        return "HP PROLIANT DL160G8 MX24140078";
      case "e44":
        return "HP PROLIANT DL160G8 MXQ4070141";
      case "e43":
        return "HP PROLIANT DL160G8 MXQ407013Y";
      case "e42":
        return "HUAWEI CLOUDENIGINE S5731-S48P4X ";
      case "e41":
        return "HP 2920-24G";
      case "e40":
        return "CISCO CATALYST 3850 48 POE + FOC1839U0SZ";
      case "e39":
        return "HP PROLIANT DL380G8 2M243902BF";
      case "e38":
        return "HP ELITEDESK MXL44525JH";
      case "e37":
        return "HP ELITEDESK MXL44525KX";
      case "e36":
        return "HP ELITEDESK MXL44525JV";
      case "e35":
        return "HP ELITEDESK MXL44525K9";
      case "e34":
        return "HP ELITEDESK MXL44525JS";
      case "e33":
        return "HP PRODESK MXL445145T";
      case "e32":
        return "HP PRODESK MXL4451CK0";
      case "e31":
        return "TRIPP LITE SMARTONLINE IPS SU6000RT4UHVBM";
      case "e30":
        return "HP NO VISIBLE  NO VISIBLE ";
      case "e29":
        return "DELL POWEEDGET720 689ZZZ1";
      case "e28":
        return "MCAFEE NSM MAPL NG A0C79320337";
      case "e27":
        return "ALCATEL OMINIPCX ZSR031330801057";
      case "e26":
        return "EMERSON VENTILADOR LIEBERT Y14LBM0030";
      case "e25":
        return "QNAP NAS GIP QPUNK05738V";
      case "e24":
        return "DELL EMC P570F G5LZRT3";
      case "e23":
        return "DELL EMC P570F H5LZRT3";
      case "e22":
        return "DELL EMC P570F J5LZRT3";
      case "e21":
        return "DELL EMCS4112F-ON 7GH4W43";
      case "e20":
        return "DELL EMC S4148T-ON 34HXV43";
      case "e19":
        return "DELL EMC S4148T-ON B3HXV43";
      case "e18":
        return "FORTINET FOTIGATE 200 F FG200FT922925999";
      case "e17":
        return "FORTINET FOTIGATE 200 F FG200922909312";
      case "e16":
        return "IBM ALM-BETB-1261 789A2CP";
      case "e15":
        return "IBM ALM-BETB-1261 789A2MG";
      case "e14":
        return "IBM ALM-BETB-1261 789A2T6";
      case "e13":
        return "IBM  9008-22L 788C3BA";
      case "e12":
        return "IBM  9008-22L 788C3CA";
      case "e11":
        return "CONTROLADORA IMB 2076-724 78E01WM";
      case "e10":
        return "BAHIA IBM 2076-92F 789A2LR";
      case "e9":
        return "SOPHOS XGS5500 X550096C6673P47";
      case "e8":
        return "SOPHOS XGS5500 X550096FMPC6H15";
      case "e7":
        return "SOPHOS XGS5500 X550096KMF89RSF";
      case "e6":
        return "SOPHOS XGS5500 X55009366W8HDC0";
      case "e5":
        return "ALCATEL OS6569-P24X4 JSZ212400153";
      case "e4":
        return "ALCATEL OS6569-P24X4 JSZ211700603";
      case "e3":
        return "ALCATEL OS6569-P24X4 JSZ212101168";
      case "e2":
        return "ALCATEL  OS6560-P24X4 JSZ212101123";
      case "e1":
        return "SIEMENS C20 CONTROLER 11081025535F";
      default:
        return "Equipo sin información";
    };
  };

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

});