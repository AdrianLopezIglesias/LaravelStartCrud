import PacientesTable from '../components/pacientes/PacientesTable.vue'

const routes = [
  { path: '/', component: PacientesTable },
  { path: '/pacientes', component: PacientesTable },
  { path: '/pacientes/:id', name: 'PacientesTable', component: PacientesTable },
  { path: '/*', component: PacientesTable }
]

export default routes; 