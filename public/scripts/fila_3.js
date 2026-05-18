document.addEventListener("DOMContentLoaded", () => {

  const info = document.querySelector(".info");

  function obtenerInfo(id) {
    switch (id) {
      case "e92":
        return "EXAGRID - 34 EX7000 AVTA201303161";
      case "e91":
        return "EXAGRID - 33 EX7000 AVTA201303155";
      case "e90":
        return "EXAGRID - 32 EX7000 AVTA201303160";
      case "e89":
        return "EXAGRID - 31 EX7000 AVTA195202917";
      case "e88":
        return "EXAGRID - 30 EX7000 AVTA201303163";
      case "e87":
        return "EXAGRID - 29 EX7000 AVTA195002835";
      case "e86":
        return "EXAGRID - 28 EX7000 AVTA195002836";
      case "e85":
        return "EXAGRID - 27 EX7000 AVTA193502396";
      case "e84":
        return "EXAGRID - 26 EX7000 AVTA201002982";
      case "e83":
        return "EXAGRID - 25 EX7000 AVTA195002837";
      case "e82":
        return "EXAGRID - 23  EX7000 AVTA193502394";
      case "e81":
        return "EXAGRID - 22 EX7000 AVTA201303165";
      case "e80":
        return "EXAGRID - 21 EX7000 AVTA170610243";
      case "e79":
        return "EXAGRID - 20 EX7000 AVTA201002981";
      case "e78":
        return "EXAGRID - 19 EX7000 AVTA201303157";
      case "e77":
        return "EXAGRID - 18 EX7000 AVTA201303162";
      case "e76":
        return "EXAGRID - 17  EX7000 AVTA201303156";
      case "e75":
        return "EXAGRID - 16 EX7000 AVTA201002983";
      case "e74":
        return "EXAGRID - 15 EX7000 AVTA201303164";
      case "e73":
        return "EXAGRID - 14 EX7000 AVATA190901463";
      case "e72":
        return "EXAGRID - 13 EX7000 AVTA192401030";
      case "e71":
        return "EXAGRID - 12 EX7000 AVTA192402027";
      case "e70":
        return "EXAGRID - 11 EX7000 AVTA192402029";
      case "e69":
        return "EXAGRID - 10 EX7000 AVTA190901460";
      case "e68":
        return "EXAGRID - 9 EX7000 CT192402028";
      case "e67":
        return "EXAGRID - 8 EX7000 - SEC AVTA190901461";
      case "e66":
        return "EXAGRID - 7 EX7000 - SEC CT418071900352";
      case "e65":
        return "EXAGRID - 6 EX7000 - SEC CT418121800008";
      case "e64":
        return "EXAGRID - 5 EX7000 - SEC CT418121800009";
      case "e63":
        return "EXAGRID - 4 EX7000 - SEC CT418121800010";
      case "e62":
        return "EXAGRID - 3 EX7000 - SEC CT418121800011";
      case "e61":
        return "EXAGRID - 2 EX7000 - SEC CT418121800013";
      case "e60":
        return "EXAGRID - 1 EX7000 - SEC CT418121800007";
      case "e59":
        return "DELL  EMC SCV360 FCNAE193300029";
      case "e58":
        return "DELL  EMC 8J3M243";
      case "e57":
        return "DELL  EMC  BJ2M243";
      case "e56":
        return "DELL  MD3860I 497RMR2";
      case "e55":
        return "DELL  EMC NX3340 1YSCMR2";
      case "e54":
        return "POWER PROTEC DD3300 D379S33";
      case "e53":
        return "POWER PROTEC DD3300 D379243";
      case "e52":
        return "DELL  EMC R740 3HR0343";
      case "e51":
        return "DELL  EMC R740 3HQZ243";
      case "e50":
        return "HP PRO LIANT DL385G7 USE103N8L4";
      case "e49":
        return "AVAYA R640 CBKKRN3";
      case "e48":
        return "AVAYA R640 FURRYS3";
      case "e47":
        return "AVAYA R640 2YRRYS3";
      case "e46":
        return "BROCADE ICX 6610-24P BXM3826L006";
      case "e45":
        return "CISCO CATALYST 3850 48 PoE+ FOC1838X1SM";
      case "e44":
        return "DELL  EMC S4128T-ON  E20W002S4128T-OM";
      case "e43":
        return "HUAWEI CLOUD ENGINE 12700E-8 YCAN05TCY855PX";
      case "e42":
        return "CISCO SMAM195 WZP23300RXL";
      case "e41":
        return "TERMINAL N/A N/A";
      case "e40":
        return "DELL EMC R742 7Q30DV2";
      case "e39":
        return "DELL EMC R741 7Q26DV2";
      case "e38":
        return "DELL EMC R740 4DL0JK2";
      case "e37":
        return "AVAYA MFG YR:2025 1KZ31V3";
      case "e36":
        return "AVAYA MFG YR:2024 23AN03600307";
      case "e35":
        return "AVAYA MFG YR:2023 C0F51V3";
      case "e34":
        return "HUAWEI AIRENGINER 9700-M-I 01Y4371PXAXYPT4";
      case "e33":
        return "HUAWEI AIRENGINER 9700-M-I 8YPAX3PCP2T41120";
      case "e32":
        return "HP  PRO DEX 1CZ14908SH";
      case "e31":
        return "HP  PRO DEX 1CZ14908S7";
      case "e30":
        return "CISCO NEXUS 9504 FLM292603U6";
      case "e29":
        return "CISCO NEXUS 9504 FLM292603U6";
      case "e28":
        return "CISCO NEXUS 9504 FLM292603U6";
      case "e27":
        return "CISCO NEXUS 9504 FLM292603U6";
      case "e26":
        return "CISCO NEXUS 9504 FLM292603U6";
      case "e25":
        return "CISCO NEXUS 9504 FLM292603U6";
      case "e24":
        return "CISCO NEXUS 9504 FLM292603U6";
      case "e23":
        return "HUAWEI NET ENGINE 8000 M1C 102345060977Y";
      case "e22":
        return "HUAWEI CLOUD ENGINE S5735 QU23A6012745Y";
      case "e21":
        return "CISCO NEXUS N9K-C93180YC-EX FDO2325014E";
      case "e20":
        return "FORTINET FORTIGATE 6OE FGT6OE4Q16082895";
      case "e19":
        return "HUAWEI NET ENGINE AR600 21500104832SM6500268";
      case "e18":
        return "CISCO CATALYST 2960 S FCW1832A52Z";
      case "e17":
        return "ORACLE ACME PACKET 3950 2306NMT003";
      case "e16":
        return "ADVA FSP 150-GE104 LBADVA71243800786";
      case "e15":
        return "CISCO 892FSP ECZ1746C0X1";
      case "e14":
        return "CISCO 3100 SERIES FJC292716ZU";
      case "e13":
        return "HUAWEI HISEC ENGINE 1022C5279182Y";
      case "e12":
        return "HUAWEI NET ENGINE AR651 21500104832SMC502010";
      case "e11":
        return "AVAYA MB450 22TN446028JD";
      case "e10":
        return "CISCO CATALYST 4500 JAE1847016U";
      case "e9":
        return "LENOVO FLEX SYSTEM ENTERPRISE  J12PLD2";
      case "e8":
        return "LENOVO THINKSYSTEM SR-590 J1004K4G";
      case "e7":
        return "PLANET N/A N/A";
      case "e6":
        return "HUAWEI CLOUD ENGINE S12700E-8 N02311000862Y";
      case "e4":
        return "TRIPPLITE SMART ONLINE 2444BY0AC757900024";
      case "e3":
        return "TRIPPLITE SMART ONLINE 2444BY0AC757900024";
      case "e2":
        return "HUAWEI CLOUD ENGINE S12700E-8 N02311000862Y";
      case "e1":
        return "HUAWEI HISEC ENGINE 1022C5279179Y";
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

});