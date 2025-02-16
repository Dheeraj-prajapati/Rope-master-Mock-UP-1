function showTechnologies(section) {
    const tabs = document.querySelectorAll('.tab');
    tabs.forEach(tab => tab.classList.remove('active-tab'));

    const activeTab = document.querySelector(`.tab.${section}`);
    activeTab.classList.add('active-tab');

    const technologies = document.querySelectorAll('.technologies');
    technologies.forEach(tech => {
        tech.classList.remove('active');
    });

    const technologiesSection = document.querySelector(`.technologies.${section}`);
    technologiesSection.classList.add('active');
    hideOtherTechnologies(section);
}

function hideOtherTechnologies(sectionToKeep) {
    const allTechnologies = document.querySelectorAll('.technologies');
    allTechnologies.forEach(tech => {
        if (!tech.classList.contains(sectionToKeep)) {
            tech.classList.remove('active');
        }
    });
}
