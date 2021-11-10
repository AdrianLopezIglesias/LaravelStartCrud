import PacientesTable from '../components/pacientes/PacientesTableO.vue'
import ErrorView from '../components/ui/ErrorView.vue'
const routes = [
  { path: '/', component: PacientesTable },
  { path: '/pacientes', component: PacientesTable },
  { path: '/pacientes/:id', name: 'PacientesTable', component: PacientesTable },
  { path: '/*', component: ErrorView }
]

export default routes; 