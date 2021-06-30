import { Login } from "../../pages/login"
import styles from './styles.module.scss'

export const Layout = () => {
  return(
    <div className={styles.appBody}>
      <div className={styles.background}>
        <div className={styles.blur}></div>
      </div>
    
      <Login />
    </div>
  )
}